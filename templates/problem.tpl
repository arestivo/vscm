{include file="header.tpl"}

<ul>
<li>
<strong>Problem Code: </strong> <a href="http://www.spoj.pl/problems/{$code}/">{$code}</a>
</li>

<li>
<strong>Solved Problem</strong>
{foreach from=$usersS item=user name=usersS}
<a class="probok" href="user.php?username={$user.username}">{$user.realname}</a>
{if not $smarty.foreach.usersS.last}, {/if}
{/foreach}
</li>

<li>
<strong>Failed Problem</strong>
{foreach from=$usersF item=user name=usersF}
<a class="probfail" href="user.php?username={$user.username}">{$user.realname}</a>
{if not $smarty.foreach.usersF.last}, {/if}
{/foreach}
</li>

<li>
<strong>Did Not Try Problem</strong>
{foreach from=$usersN item=user name=usersN}
<a href="user.php?username={$user.username}">{$user.realname}</a>
{if not $smarty.foreach.usersN.last}, {/if}
{/foreach}
</li>
</ul>

<div id="problemchart" style="width: 100%; height: 400px"></div>

{include file="footer.tpl"}
