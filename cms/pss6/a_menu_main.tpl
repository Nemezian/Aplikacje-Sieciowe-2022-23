{function name=Nav_menu depth=1}
	{foreach $data as $node}
	
		  <li>
	
			<a href="{$node->url}">{$node->menutext}</a>
	
			{if isset($node->children)}
			<ul>
			  {Nav_menu data=$node->children depth=$depth+1}
			</ul>
			{/if}
		  </li>
	
	  {/foreach}
	
	{/function}
	
	{if isset($nodes)}
	<ul>
	{Nav_menu data=$nodes depth=0}
	</ul>
	{/if}