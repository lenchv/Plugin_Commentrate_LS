<link rel="stylesheet" type="text/css" href="{$aTemplateWebPathPlugin.commentrate|cat:'css/style.css'}" media="all" />
<section class="block">
	<header class="block-header">
		<h3>{$aLang.plugin.commentrate.commentrate_title}</h3>
	</header>
	
	<div class="block-content">
		<ul class='item-list'>
			{foreach from=$aCommentrate item=oComment}
				{assign var="sAvatarPath" value=$oComment->getUser()->getProfileAvatarPath(48)}	
				{assign var="sLogin" value=$oComment->getUser()->getLogin()}
				{assign var="sProfilePath" value=$oComment->getUser()->getUserWebPath()}
				<li class='js-title-comment'>
					<a href='{$sProfilePath}' >
						<img src='{$sAvatarPath}' alt='avatar' class='avatar'>
					</a>
					
					<a href='{$sProfilePath}' class='author'>{$sLogin}</a>
					
					<a href="#comment{$oComment->getId()}" class="link-dotted" title="{$aLang.comment_url_notice}">
						<time datetime="{date_format date=$oComment->getDate() format='c'}">{date_format date=$oComment->getDate() hours_back="12" minutes_back="60" now="60" day="day H:i" format="j F Y, H:i"}</time>
					</a>
					
					
						<span class='commentrate-vote
						{if $oComment->getRating() > 0}
							commentrate-positive-vote 
						{elseif $oComment->getRating() < 0}
							commentrate-negative-vote
						{/if}
						'>{if $oComment->getRating() > 0}+{/if}{$oComment->getRating()}</span>

					<p id="block_blog_info">{$oComment->GetText()}</p>
				</li>
			{/foreach}
		</ul>
	</div>

</section>