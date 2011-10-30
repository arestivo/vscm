{include file="header.tpl"}
<h2>User Statistics</h2>

<ul>
	<li>Name: <a href="http://www.spoj.pl/users/{$stats.username}/">{$stats.realname}</a></li>
	<li>Submissions: {$stats.submissions}</li>
	<li>Accepted: {$stats.accepted}</li>
	<li>Accepted Ratio: 
		{if $stats.submissions != 0}
			{($stats.accepted / $stats.submissions * 100)|string_format:"%.0f"}%
		{else}-
		{/if}
	</li>
</ul>

<div id="problemchart" style="width: 100%; height: 400px"></div>

{include file="footer.tpl"}
