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
<tr>
{foreach from=$problems item=problem name=problems}
<td class="{if $problem.accepted > 0}probok{else}probfail{/if}"><a href="http://www.spoj.pl/problems/{$problem.code}/">{$problem.code}</a> {($problem.accepted / ($problem.accepted + $problem.failed) * 100)|string_format:"%.0f"}%</td>
{if $smarty.foreach.problems.index % 5 == 4}
</tr>
<tr>
{/if}
{/foreach}
</tr>
</table>

{include file="footer.tpl"}
