{include file="header.tpl"}
<h2>Statistics</h2>

<table>
<tr><th>Username</th><th>Submissions</th><th>Accepted</th></tr>
{foreach from=$stats item=stat}
<tr>
	<td>{$stat.realname}</td>
	<td>{$stat.submissions}</td>
	<td>{$stat.accepted}</td>
</tr>
{/foreach}
</table>

{include file="footer.tpl"}
