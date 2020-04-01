<?php 
	global $ide;
?>
<script type="text/javascript">
	$(function() {
		$("#accordion").accordion({
			autoHeight: false,
			navigation: true
		});
	});
</script>
<div class='message'>
	<div class='title'><?php echo ucwords($name);?>'s Perfil</div>
	<div class='content'>
		<table width='100%'>
			<td width='20%' valign='top'>
			<div class='avatar'>
			<?php 
				if(empty($profile[0]['avatar']))
					echo "<img src='".WEBSITE."/public/uploads/avatars/no_avatar.png'/>";
				else
					echo "<img src='".WEBSITE."/public/uploads/avatars/".$profile[0]['avatar']."'/>";
			?>
			</div>
			</td>
			<td valign='top'>
				<label style='margin-top: 10px;'>Nome real:</label> <?php echo (empty($profile[0]['rlname'])) ? "Não especificado." : $profile[0]['rlname']; ?><br/>
				<br /><label style='margin-top: 0px;'>Localização:</label> <?php echo (empty($profile[0]['location'])) ? "Não especificado." : $profile[0]['location']; ?><br/>
			<?php 
				if(!$isFriend && $ide->isLogged() && $name != $_SESSION['nickname']) {
					echo "<a href='".url('profile/addFriend/'.$profile[0]['id'])."'>Adicionar amigo!</a>";
				}
				
				if($ide->isLogged() && $isFriend) {
					echo "<a href='#' onClick='if(confirm(\"Are you sure?\")) window.location.href=\"".url('profile/removeFriend/'.$id)."\"'>Remover amigo</a>";
				}
			?>
			</td>
		</table>
	</div>
	<div id="accordion">
	<h3 style="margin-left:10px;"><a href="#">Sobre mim</a></h3>
	<div>
		<p style="margin: 5px;">
			<?php 
				if(empty($profile[0]['about_me']))
					alert("Este usuário não adicionou nada sobre ele ainda.");
				else
					echo nl2br($profile[0]['about_me']);
			?>
		</p>
	</div>
	<h3 style="margin-left:10px;"><a href="#">Videos</a></h3>
	<div>
		<p style="margin: 5px;">
			<?php 
				if(empty($videos))
					alert("Este usuário não adicionou nenhum video ainda.");
				else {
					foreach($videos as $video) {
						echo "<div style='float: left; margin-left: 10px; width: 150px;'>";
							echo "<div style='float: left;'>";
							echo "<a href='".WEBSITE."/index.php/video/view/".$video['id']."'><img style='border: 1px groove silver; padding: 1px;' src='http://i1.ytimg.com/vi/".$video['youtube']."/default.jpg'/></a>";
							echo "</div>";
							echo "<div style='float: left; margin-left: 5px;'>";
							echo "<a href='".WEBSITE."/index.php/video/view/".$video['id']."'>".$video['title']."</a><br/>";
							echo "Visualizações: ".$video['views']."<br/>";
							echo "Adicionado: ".ago($video['time'])."<br/>";
							echo "</div>";
						echo "</div>";
					}
				}
			?>
		</p>
	</div>
	<h3 style="margin-left:10px;"><a href="#">Amigos</a></h3>
	<div>

			<?php
				if(empty($friends)) {
					alert("Este usuário não tem amigos ainda.");
				}
				else {
					foreach($friends as $friend) {
						$avatar = (empty($friend['avatar'])) ? "no_avatar.png" : $friend['avatar'];
						echo "<a href='".url('profile/view/'.$friend['nickname'])."'><div class='friend'><img src='".url('uploads/avatars/'.$avatar, true)."'/><br/>".ucwords($friend['nickname'])."</div></a>";
					}
				}
			?>
		
	</div>
</div>
</div>