<link rel="stylesheet" type="text/css" href="{$aTemplateWebPathPlugin.commentrate|cat:'css/style.css'}" media="all" />
<section class="block">
	<header class="block-header">
		<h3>{$aLang.plugin.commentrate.commentrate_title}</h3>
	</header>
	
	<div class="block-content">
		{hook run='commentrate_items'}
	</div>

</section>