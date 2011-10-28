{include file="header.tpl"}
<h2>User Statistics</h2>

<table>
<tr><th>Username</th><th>Submissions</th><th>Accepted</th><th>Ratio</th></tr>
{foreach from=$stats item=stat}
<tr>
	<td>{$stat.realname}</td>
	<td>{$stat.submissions}</td>
	<td>{$stat.accepted}</td>
	<td>
		{if $stat.submissions != 0}
			{($stat.accepted / $stat.submissions * 100)|string_format:"%.0f"}%
		{else}-
		{/if}
	</td>
</tr>
{/foreach}
</table>

<h2>Problem Statistics</h2>
<table>
{foreach from=$problems item=problem}
<tr>{$problem.code}</tr>
{/foreach}
</table>

{include file="footer.tpl"}
