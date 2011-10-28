{include file="header.tpl"}
<h2>{$contest.name}</h2>

<table>

<tr>
<td>Contestant</td>
{foreach from=$problems item=problem}
<td><a href="http://www.spoj.pl/problems/{$problem.code}/">{$problem.code}</a></td>
{/foreach}
<td>Solved</td>
<td>Time</td>
</tr>

{foreach from=$users key=uid item=user}
<tr><td>{$user.realname}</td>

{foreach from=$users[$uid]['problems'] item=problem} 
	{if $problem.state == 'AC'}
	<td class="accepted">{$problem.time} ({$problem.fails})</td>
	{else}
		{if $problem.fails == 0}
		<td class="notdone">-</td>
		{else}
		<td class="failed">{$problem.fails})</td>
		{/if}
	{/if}
{/foreach}
<td>{$user.solved}</td><td>{$user.total}</td>
</tr>
{/foreach}
</table>

{include file="footer.tpl"}
