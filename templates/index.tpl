{include file="header.tpl"}
<h2>Statistics</h2>

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

{include file="footer.tpl"}
