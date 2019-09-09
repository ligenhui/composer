<?php


namespace ligenhui\package;


class Tree
{
    /**
     * 根据子节点返回所有父节点
     * @param  array  $lists 数据集
     * @param  int $id  子节点id
     * @return array
     */
    public static function getParents($lists = [], $id = 0)
    {
        $trees = [];
        foreach ($lists as $value) {
            if ($value['access_id'] == $id) {
                $trees[] = $value;
                $trees   = array_merge(self::getParents($lists, $value['parent_id']), $trees);
            }
        }
        return $trees;
    }

    /**
     * 将数据集格式化成层次结构
     * @param array/object $lists 要格式化的数据集，可以是数组，也可以是对象
     * @param int $parent_id 父级id
     * @param int $max_level 最多返回多少层，0为不限制
     * @param int $curr_level 当前层数
     * @return array
     */
    public static function toLayer($lists = [], $parent_id = 0, $max_level = 0, $curr_level = 0)
    {
        $trees = [];
        $lists = array_values($lists);
        foreach ($lists as $key => $value) {
            if ($value['parent_id'] == $parent_id) {
                if ($max_level > 0 && $curr_level == $max_level) {
                    return $trees;
                }
                unset($lists[$key]);
                $child = self::toLayer($lists, $value['access_id'], $max_level, $curr_level + 1);
                if (!empty($child)) {
                    $value['child'] = $child;
                }
                $trees[] = $value;
            }
        }
        return $trees;
    }
}