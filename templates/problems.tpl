{include file="header.tpl"}
<h2>Problem Statistics 2</h2>

<div id="problemchart" style="width: 100%; height: 400px"></div>

<table>
<tr>
{foreach from=$problems item=problem name=problems}
<td class="{if $problem.accepted > 0}probok{else}probfail{/if}">
	<span class="inlinesparkline">{$problem.accepted},{$problem.failed}</span>
	<a href="http://www.spoj.pl/problems/{$problem.code}/">{$problem.code}</a> 
</td>
{if $smarty.foreach.problems.index % 5 == 4}
</tr>
<tr>
{/if}
{/foreach}
</tr>
</table>

{include file="footer.tpl"}
