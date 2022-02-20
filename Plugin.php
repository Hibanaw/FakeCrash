<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * Fake Crash - 傲娇的页面标题
 * 
 * @package FakeCrash
 * @author Hibanaw
 * @version 1.0.1
 * @link https://hibanaw.com
 */
class FakeCrash_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->footer = array('FakeCrash_Plugin', 'footer');
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}

    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        /** 分类名称 */
        $jquery = new Typecho_Widget_Helper_Form_Element_Checkbox('jquery', array('jquery' => '加载jQuery'));
        $form->addInput($jquery);
    }

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    /**
     * 插件实现方法
     *
     * @access public
     * @return void
     */
    public static function footer()
    {
        $Options = Helper::options()->plugin('FakeCrash');
        if ($Options->jquery || in_array('jquery', $Options->jquery)) {
            echo '<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js"></script>';
        }
        echo '<script type="text/javascript" src="/usr/plugins/FakeCrash/changefavicon.js"></script>';

    }
}
