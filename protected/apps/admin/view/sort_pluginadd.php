<?php if(!defined('APP_NAME')) exit;?>
<script language="javascript">
  $(function ($) { 
	//自动获取栏目名称
	$('#method').change(function(){
		 $('#sortname').val($(this).find('option:selected').text());
	});
	//表单验证
	var items_array = [
		{ name:"sortname",simple:"栏目名称",focusMsg:'填写栏目名称'},
		{ name:"method",simple:"应用",focusMsg:'选择应用'}
	];

	$("#info").skygqCheckAjaxForm({
		items			: items_array
	});
  });
</script>
          <form action="{url('sort/pluginadd')}"  method="post" id="info">
          <table width="100%" border="0" cellpadding="0" cellspacing="1"   class="all_cont">  
          <tr>
            <td align="right" width="200">所属类别：</td>
            <td align="left">
             <select name="parentid" id="parentid">
               <option selected="selected" value="0" >=作为顶级分类=</option>
                  <?php 
                      if(!empty($list)){
                      foreach($list as $vo){
                          $space = str_repeat('├┈┈┈', $vo['deep']-1);                     
                             $option.= '<option value="'.$vo['id'].'">'.$space.$vo ['name'].'</option>';
                        }
                        echo $option;
                     }
                  ?>
             </select>
            </td>
            <td align="left" class="inputhelp">支持无限分类</td>
          </tr>  
          <tr>
            <td align="right">栏目名称：</td>
            <td align="left">
              <input type="text" name="sortname" id="sortname">
            </td>
            <td align="left" class="inputhelp">请填写要添加分类的名称</td>
          </tr>
          <tr>
            <td align="right">应用控制器：</td>
            <td align="left">
              <select name="method" id="method">
               {$choose}
              </select>           
            </td>
            <td align="left" class="inputhelp">默认为应用中index控制器的index方法</td>
          </tr>         
          <tr>
            <td align="right">排序：</td>
            <td align="left">
              <input type="text" name="norder" id="norder" value="100" size="10">
            </td>
            <td align="left" class="inputhelp">请以数字表示分类的排序（值越小越靠前）</td>
          </tr> 
          <tr>
            <td align="right">是否前台显示：</td>
            <td align="left"><input checked="checked" name="ifmenu"  type="radio" value="1" />是 <input name="ifmenu" type="radio" value="0" />否</td>
            <td class="inputhelp">选择是否在前台各种导航菜单中显示</td>
          </tr>           
          <tr>
            <td width="200">&nbsp;</td>
            <td align="left" colspan="2">
              <input type="submit" value="添加" class="btn btn-primary btn-small">
            </td>
          </tr> 
          </table>
          </form>         