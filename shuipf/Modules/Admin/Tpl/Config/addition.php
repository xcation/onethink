<?php if (!defined('SHUIPF_VERSION')) exit(); ?>
<Admintemplate file="Common/Head"/>
<body class="J_scroll_fixed">
    <div class="wrap J_check_wrap">
        <Admintemplate file="Common/Nav"/>
        <div class="table_full">
            <form method='post'   id="myform" class="J_ajaxForm"  action="{:U('Config/addition')}">
                <div class="h_a">云平台设置</div>
                <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
                    <tr>
                        <th width="140">是否开启云平台:</th>
                        <td><select name="CLOUD_ON" id="CLOUD_ON" >
                                <option value="0" <if condition="$addition['CLOUD_ON'] eq '0' "> selected</if>>关闭</option>
                                <option value="1" <if condition="$addition['CLOUD_ON'] eq '1' "> selected</if>>开启</option>
                            </select> <span class="gray"> 为了安全，请在需要的时候开启！</span></td>
                    </tr>
                    <tr>
                        <th width="140">站点密钥:</th>
                        <td>{:C('AUTHCODE')}
                            <span class="gray"> 为了安全，请不要随意泄露，建议定期更改！</span></td>
                    </tr>
                </table>
                <div class="h_a">Cookie配置</div>
                <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
                    <tr>
                        <th width="140">Cookie有效期:</th>
                        <td><input type="text" class="input"  name="COOKIE_EXPIRE" value="{$addition.COOKIE_EXPIRE}" size="40">
                            <span class="gray"> 单位秒</span></td>
                    </tr>
                    <tr>
                        <th width="140">Cookie有效域名:</th>
                        <td><input type="text" class="input"  name="COOKIE_DOMAIN" value="{$addition.COOKIE_DOMAIN}" size="40">
                            <span class="gray"> 例如：“.abc3210.com”表示这个域名下都可以访问</span></td>
                    </tr>
                    <tr>
                        <th width="140">Cookie路径:</th>
                        <td><input type="text" class="input"  name="COOKIE_PATH" value="{$addition.COOKIE_PATH}" size="40">
                            <span class="gray"> 一般是“/”</span></td>
                    </tr>
                </table>
                <div class="h_a">Session配置</div>
                <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
                    <tr>
                        <th width="140">Session前缀:</th>
                        <td><input type="text" class="input"  name="SESSION_PREFIX" value="{$addition.SESSION_PREFIX}" size="40">
                            <span class="gray">一般为空即可</span></td>
                    </tr>
                    <tr>
                        <th width="140">Session域名:</th>
                        <td><input type="text" class="input"  name="SESSION_OPTIONS[domain]" value="{$addition.SESSION_OPTIONS.domain}" size="40">
                            <span class="gray"> 一般是“.abc3210.com”</span></td>
                    </tr>
                </table>
                <div class="h_a">错误设置</div>
                <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
                    <tr>
                        <th width="140">显示错误信息:</th>
                        <td><input name="SHOW_ERROR_MSG" type="radio" value="1" <if condition=" $addition['SHOW_ERROR_MSG'] ">checked</if>> 开启 <input name="SHOW_ERROR_MSG" type="radio" value="0" <if condition=" !$addition['SHOW_ERROR_MSG'] ">checked</if>> 关闭</td>
                    </tr>
                    <tr>
                        <th width="140">错误显示信息:</th>
                        <td><input type="text" class="input"  name="ERROR_MESSAGE" value="{$addition.ERROR_MESSAGE}" size="40"></td>
                    </tr>
                    <tr>
                        <th width="140">错误定向页面:</th>
                        <td><input type="text" class="input"  name="ERROR_PAGE" value="{$addition.ERROR_PAGE}" size="40">
                            <span class="gray">例如：http://www.abc3210.com/error.html</span></td>
                    </tr>
                </table>
                <div class="h_a">URL设置</div>
                <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
                    <tr>
                        <th width="140">URL不区分大小写:</th>
                        <td><input name="URL_CASE_INSENSITIVE" type="radio" value="1" <if condition=" $addition['URL_CASE_INSENSITIVE'] ">checked</if>> 开启 <input name="URL_CASE_INSENSITIVE" type="radio" value="0" <if condition=" !$addition['URL_CASE_INSENSITIVE'] ">checked</if>> 关闭</td>
                    </tr>
                    <tr>
                        <th width="140">URL访问模式:</th>
                        <td><select name="URL_MODEL" id="URL_MODEL" >
                                <option value="0" <if condition="$addition['URL_MODEL'] eq '0' "> selected</if>>普通模式</option>
                                <option value="1" <if condition="$addition['URL_MODEL'] eq '1' "> selected</if>>PATHINFO 模式</option>
                                <option value="2" <if condition="$addition['URL_MODEL'] eq '2' "> selected</if>>REWRITE  模式</option>
                                <option value="3" <if condition="$addition['URL_MODEL'] eq '3' "> selected</if>>兼容模式</option>
                            </select> <span class="gray"> 除了普通模式外其他模式可能需要服务器伪静态支持，同时需要写相应伪静态规则！</span></td>
                    </tr>
                    <tr>
                        <th width="140">PATHINFO模式参数分割线:</th>
                        <td><input type="text" class="input"  name="URL_PATHINFO_DEPR" value="{$addition.URL_PATHINFO_DEPR}" size="40">
                            <span class="gray"> 例如：“/”</span></td>
                    </tr>
                    <tr>
                        <th width="140">URL伪静态后缀:</th>
                        <td><input type="text" class="input"  name="URL_HTML_SUFFIX" value="{$addition.URL_HTML_SUFFIX}" size="40">
                            <span class="gray"> 例如：“.html”</span></td>
                    </tr>
                </table>
                <div class="h_a">表单令牌</div>
                <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
                    <tr>
                        <th width="140">是否开启令牌验证:</th>
                        <td><input name="TOKEN_ON" type="radio" value="1" <if condition=" $addition['TOKEN_ON'] ">checked</if>> 开启 <input name="TOKEN_ON" type="radio" value="0" <if condition=" !$addition['TOKEN_ON'] ">checked</if>> 关闭</td>
                    </tr>
                    <tr>
                        <th width="140">表单隐藏字段名称:</th>
                        <td><input type="text" class="input"  name="TOKEN_NAME" value="{$addition.TOKEN_NAME}" size="40">
                            <span class="gray"> 令牌验证的表单隐藏字段名称！</span></td>
                    </tr>
                    <tr>
                        <th width="140">令牌哈希验证规则:</th>
                        <td><input type="text" class="input"  name="TOKEN_TYPE" value="{$addition.TOKEN_TYPE}" size="40">
                            <span class="gray"> 令牌哈希验证规则 默认为MD5</span></td>
                    </tr>
                </table>
                <div class="h_a">分页配置</div>
                <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
                    <tr>
                        <th width="140">默认分页数:</th>
                        <td><input type="text" class="input"  name="PAGE_LISTROWS" value="{$addition.PAGE_LISTROWS}" size="40">
                            <span class="gray"> 默认20！</span></td>
                    </tr>
                    <tr>
                        <th width="140">分页变量:</th>
                        <td><input type="text" class="input"  name="VAR_PAGE" value="{$addition.VAR_PAGE}" size="40">
                            <span class="gray"> 默认：page，建议不修改</span></td>
                    </tr>
                </table>
                <div class="h_a">杂项配置</div>
                <table cellpadding=0 cellspacing=0 width="100%" class="table_form" >
                    <tr>
                        <th width="140">默认分组:</th>
                        <td><input type="text" class="input"  name="DEFAULT_GROUP" value="{$addition.DEFAULT_GROUP}" size="40">
                            <span class="gray"> 默认：Contents，建议不修改，填写时注意大小写</span></td>
                    </tr>
                    <tr>
                        <th width="140">默认时区:</th>
                        <td><input type="text" class="input"  name="DEFAULT_TIMEZONE" value="{$addition.DEFAULT_TIMEZONE}" size="40"></td>
                    </tr>
                    <tr>
                        <th width="140">AJAX 数据返回格式:</th>
                        <td><input type="text" class="input"  name="DEFAULT_AJAX_RETURN" value="{$addition.DEFAULT_AJAX_RETURN}" size="40">
                            <span class="gray">默认AJAX 数据返回格式,可选JSON XML ...</span></td>
                    </tr>
                    <tr>
                        <th width="140">默认参数过滤方法:</th>
                        <td><input type="text" class="input"  name="DEFAULT_FILTER" value="{$addition.DEFAULT_FILTER}" size="40">
                            <span class="gray"> 默认参数过滤方法 用于 $this->_get('变量名');$this->_post('变量名')...</span></td>
                    </tr>
                    <tr>
                        <th width="140">默认语言:</th>
                        <td><input type="text" class="input"  name="DEFAULT_LANG" value="{$addition.DEFAULT_LANG}" size="40">
                            <span class="gray">默认语言</span></td>
                    </tr>
                    <tr>
                        <th width="140">数据缓存类型:</th>
                        <td><select name="DATA_CACHE_TYPE" id="DATA_CACHE_TYPE" >
                                <option value="File" <if condition="$addition['DATA_CACHE_TYPE'] eq 'File' "> selected</if>>File</option>
                                <option value="Memcache" <if condition="$addition['DATA_CACHE_TYPE'] eq 'Memcache' "> selected</if>>Memcache</option>
                            </select>
                            <span class="gray">数据缓存类型,支持:File|Memcache</span></td>
                    </tr>
                    <tr>
                        <th width="140">子目录缓存:</th>
                        <td><input name="DATA_CACHE_SUBDIR" type="radio" value="1" <if condition=" $addition['DATA_CACHE_SUBDIR'] ">checked</if>> 是 <input name="SESSION_AUTO_START" type="radio" value="0" <if condition=" !$addition['DATA_CACHE_SUBDIR'] ">checked</if>> 否
                    <span class="gray">使用子目录缓存 (自动根据缓存标识的哈希创建子目录)</span></td>
                    </tr>
                    <tr>
                        <th width="140">函数加载:</th>
                        <td><input type="text" class="input"  name="LOAD_EXT_FILE" value="{$addition.LOAD_EXT_FILE}" size="40">
                            <span class="gray">加载shuipf/Common/目录下的扩展函数，扩展函数建议添加到extend.php。多个用逗号间隔。</span></td>
                    </tr>
                </table>
                <div class="btn_wrap">
                    <div class="btn_wrap_pd">
                        <button class="btn btn_submit mr10 J_ajax_submit_btn" type="submit">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{$config_siteurl}statics/js/common.js?v"></script> 
    <script type="text/javascript">
        function generates(genid) {
            //生成静态
            if (genid == 1) {
                $("#index_ruleid_1").show();
                $("#index_ruleid_1 select").attr("disabled", false);
                $("#index_ruleid_0").hide();
                $("#index_ruleid_0 select").attr("disabled", "disabled");
            } else {
                $("#index_ruleid_0").show();
                $("#index_ruleid_0 select").attr("disabled", false);
                $("#index_ruleid_1").hide();
                $("#index_ruleid_1 select").attr("disabled", "disabled");
            }
        }
    </script>
</body>
</html>