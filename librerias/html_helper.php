<?php

function createSelect($name, $list, $id, $value, $id_selected=null, $class="")
{
	$html="";
	$html.="<select name=\"$name\" class=\"$class\" >";
	foreach($list as $item){
		$selected=$item[$id]==$id_selected ? ' selected':'';
		$html.="<option value=\"$item[$id]\"$selected>$item[$value]</option>";
	}
	$html.="</select>";
	return $html;
}