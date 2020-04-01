<div class="title">
	Status: PokeMaster X
</div>
<div class="info">
	{foreach from=$worlds key=id item=world}
	
		<b>Status:</b>  
		{if $serverOnline[$id]}
			<font color='green'>Online</font><br />
			<b>Uptime:</b> {$serverUptime[$id]} <br />

		{else}
			<font color='red'>Offline</font><br />
		{/if}
	{/foreach}
</div>