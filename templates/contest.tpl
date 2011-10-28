{include file="header.tpl"}
<h2>{$contest.name}</h2>

<table class="results">

<tr>
<th>Contestant</th>
{foreach from=$problems item=problem}
<th><a href="http://www.spoj.pl/problems/{$problem.code}/">{$problem.code}</a></th>
{/foreach}
<th>Solved</th>
<th>Time</th>
</tr>

{foreach from=$users key=uid item=user}
<tr><td class="name">{$user.realname}</td>

{foreach from=$users[$uid]['problems'] item=problem} 
	{if $problem.state == 'AC'}
	<td class="accepted">{$problem.time} ({$problem.fails})</td>
	{else}
		{if $problem.fails == 0}
		<td class="notdone">-</td>
		{else}
		<td class="failed">({$problem.fails})</td>
		{/if}
	{/if}
{/foreach}
<td class="solved">{$user.solved}</td><td class="total">{$user.total}</td>
</tr>
{/foreach}
</table>

{include file="footer.tpl"}
