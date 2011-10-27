{include file="header.tpl"}
<h2>Statistics</h2>

<table>
<tr><th>Username</th><th>Submissions</th></tr>
{foreach from=$stats item=stat}
<tr><td>{$stat.realname}</td><td>{$stat.submissions}</td></tr>
{/foreach}
</table>

{include file="footer.tpl"}
