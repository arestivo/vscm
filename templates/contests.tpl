{include file="header.tpl"}
<h2>Contests</h2>

<table>
<tr><th>Date</th><th>Duration</th><th>Name</th></tr>
{foreach from=$contests item=contest}
<tr>
  <td>{$contest.start|date_format:"%b %e, %Y %H:%M"}</td>
  <td>{($contest.stop - $contest.start)/60/60} hours</td>
  <td>{if $smarty.now > $contest.start}
		<a href="contest.php?cid={$contest.cid}">{$contest.name}</a>
	  {else}
		{$contest.name}
	  {/if}
	{if $smarty.now >= $contest.start and $smarty.now <= $contest.stop}
		<span class="label success">Running</span>
	{/if}
	{if $smarty.now > $contest.stop}
		<span class="label warning">Ended</span>
	{/if}
	{if $smarty.now < $contest.start}
		<span class="label notice">Scheduled</span>
	{/if}
  </td>
</tr>
{/foreach}
</table>

{include file="footer.tpl"}
