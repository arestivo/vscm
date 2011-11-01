{include file="header.tpl"}
<h2>User Statistics</h2>

<table>
<tr><th>Username</th><th>Solved</th><th>Submissions</th><th>Accepted</th><th>Ratio</th></tr>
{foreach from=$stats item=stat}
<tr>
	<td>
		<span class="inlinesparkline">{$stat.accepted},{$stat.failed}</span>
		<a href="user.php?username={$stat.username}">{$stat.realname}</a>
	</td>
	<td>
		{$stat.solved}
		{if $stat.solved_weekly > 0}<img src="images/greenarrow.gif" title="Last week: {$stat.solved_weekly}" class="arrow"/>{/if}
	</td>
	<td>
		{$stat.submissions} 		
		{if $stat.submissions_weekly > 0}<img src="images/greenarrow.gif" title="Last week: {$stat.submissions_weekly}" class="arrow"/>{/if}
	</td>
	<td>
		{$stat.accepted}
		{if $stat.accepted_weekly > 0}<img src="images/greenarrow.gif" title="Last week: {$stat.accepted_weekly}" class="arrow"/>{/if}
	</td>
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
