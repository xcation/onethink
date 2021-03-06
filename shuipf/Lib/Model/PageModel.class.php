<?php

/**
 * 单页模型
 * Some rights reserved：abc3210.com
 * Contact email:admin@abc3210.com
 */
class PageModel extends CommonModel {

    //array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])
    protected $_validate = array(
        array('catid', 'require', '栏目ID不能为空！', 0, 'regex', 3),
        array('title', 'require', '标题不能为空！', 1, 'regex', 3),
        array('content', 'require', '内容不能为空！', 1, 'regex', 3),
    );
    //自动完成
    protected $_auto = array(
        //array(填充字段,填充内容,填充条件,附加规则)
        array('updatetime', 'time', 1, 'function'),
    );

    /**
     * 根据栏目ID获取内容
     * @param type $catid 栏目ID
     * @return boolean
     */
    public function getPage($catid) {
        if (empty($catid)) {
            return false;
        }
        return $this->where(array('catid' => $catid))->find();
    }

    /**
     * 更新单页内容
     * @param type $post 表单数据
     * @return boolean
     */
    public function savePage($post) {
        if (empty($post)) {
            $this->error = '内容不能为空！';
            return false;
        }
        $data = $post['info'];
        //表单令牌
        $data[C("TOKEN_NAME")] = $post[C("TOKEN_NAME")];
        $catid = $data['catid'];
        //单页内容
        $info = $this->where(array('catid' => $catid))->find();
        if ($info) {
            unset($data['catid']);
        }
        $data = $this->token(false)->create($data, isset($data['catid']) ? 1 : 2);
        if ($data) {
            //取得标题颜色
            if (isset($post['style_color'])) {
                //颜色选择为隐藏域 在这里进行取值
                $data['style'] = $post['style_color'] ? strip_tags($post['style_color']) : '';
                //标题加粗等样式
                if (isset($post['style_font_weight'])) {
                    $data['style'] = $data['style'] . ($post['style_font_weight'] ? ';' : '') . strip_tags($post['style_font_weight']);
                }
            }
            if ($info) {
                if ($this->where(array('catid' => $catid))->save($data) !== false) {
                    return true;
                }
            } else {
                if ($this->add($data) !== false) {
                    return true;
                }
            }
            $this->error = '操作失败8！';
            return false;
        } else {
            return false;
        }
    }

}
