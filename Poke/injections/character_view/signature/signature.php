<?PHP

	/**
	 * Signature Injection
	 * ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
	 * @author Christopher `Chris/Absolute Mango` Eklund
	 * @version 1.0.0
	 *
  	 **/
	
	
	// Create an empty config array.
	$config = array( );
	// Set the cache life time.
	$cacheTime = 60 * 30;
	
	
	
	// Create a constant holding the base path.
	define( 'BASEPATH', '../../../' );
	// Create a constant holding the base path.
	define( 'FCPATH', BASEPATH );
	// Create a constant holding the base path to the application folders.
	define( 'APPPATH', BASEPATH.'system/application/' );
	// Create a constant holding the base path to the system folders.
	define( 'BASEPATH_SYSTEM', APPPATH.'libraries/' );
	// Create a constant holding the base path to the signatures injection.
	define( 'BASEPATH_SIGNATURE', BASEPATH.'injections/character_view/signature/' );


	// Include the MadGD library.
	require( BASEPATH_SIGNATURE.'libraries/gd.class.php' );
	// Include the POT library.
	require( BASEPATH_SYSTEM.'POT/OTS.php' );
	// Include the system file.
	require( BASEPATH_SYSTEM.'system.php' );
	// Include the configuration file.
	require( BASEPATH.'config.php' );

	date_default_timezone_set($config['timezone']);
	// Instantiate a new MadGD object.
	$MadGD = new MadGD;
	// Temporarily disable test mode.
	$MadGD->testMode = false;
	// Give a background to the MadGD object.
	$MadGD->setBackground( BASEPATH_SIGNATURE.'images/signatures/default.png' );
	// Give the equipments a background.
	$MadGD->setEquipmentBackground( BASEPATH_SIGNATURE.'images/equipments.png' );
	// Give the signature a default font style.
	$MadGD->setDefaultStyle( 
		BASEPATH_SIGNATURE.'data/fonts/arial.ttf', 
		BASEPATH_SIGNATURE.'data/fonts/arialbd.ttf',
		8
	);
	
	
	// Secure the name against SQL injections.
	$name = ( isset( $_GET['name'] ) ? $_GET['name'] : null );
	// Create a few necessary variables.
	list( $row, $height ) = array( .5, 14 );
	
	
	// Instantiate a new POT object.
	$ots = POT::getInstance( );
	// Connect to the database.
	$ots->connect( POT::DB_MYSQL, connection( ) );
	// Create a variable holding the database handle.
	$SQL = POT::getInstance()->getDBHandle();
	
	// Instantiate a new OTS_PLAYER object.
	$character = new OTS_Player( );
	// Find a player.
	$character->find( $name );
	// Return false in case a player was not found.
	if ( !$character->isLoaded( ) )
	{
		// Send the headers.
		header( 'Content-type: image/png' );
		// Include the cache file.
		echo file_get_contents( BASEPATH_SIGNATURE.'images/false-character.png' );
		exit;
	}
		
	
	
	
	// Get all the cache images.
	$cacheImages = scandir( BASEPATH_SIGNATURE.'cache/' );
	// Loop through all of the cache images.
	foreach( $cacheImages as $cacheImage )
	{
		// Continue along until you find a matching cache image.
		if ( !preg_match( '/'.$character->getId( ).'_([0-9]{10})\.png/', $cacheImage ) )
			continue;
		
		// Remove the player ID from the filename.
		$pieces = explode( '_', $cacheImage );
		// Remove the extension from the file name.
		$pieces = explode( '.', $pieces[1] );
		
		// Check if the lastUpdate + the cache update time is more than the current time.
		if ( ( $pieces[0] + $cacheTime ) > time( ) )
		{
			// Send the headers.
			header( 'Content-type: image/png' );
			// Include the cache file.
			echo file_get_contents( BASEPATH_SIGNATURE.'cache/'.$cacheImage );
			exit;
		}
		else
		{
			// Remove the current cache file.
			unlink( BASEPATH_SIGNATURE.'cache/'.$cacheImage );
			break;
		}
	}
	
	
	// Player Name
	$MadGD->addText( 'Nome:', $MadGD->textBold )->setPosition( 10, $row * $height );
	$MadGD->addText( $character->getName( ), ( $character->isOnline() ? array( 'color' => '5df82d' ) : array( ) ) )->setPosition( ); $row++;
	// Player Sex
	$MadGD->addText( 'G&ecirc;nero:', $MadGD->textBold )->setPosition( 10, $row * $height );
	$MadGD->addText( $character->getSex( ) == 1 ? 'Masculino' : 'Feminino' )->setPosition( ); $row++;
	// Player Profession
	$MadGD->addText( 'Profiss&atilde;o:', $MadGD->textBold )->setPosition( 10, $row * $height );
	$MadGD->addText( $config['vocations'][$character->getVocation( )] )->setPosition( ); $row++;
	// Player Level
	$MadGD->addText( 'Level:', $MadGD->textBold )->setPosition( 10, $row * $height );
	$MadGD->addText( $character->getLevel( ) )->setPosition( ); $row++;
	// Player World
	$MadGD->addText( 'Mundo:', $MadGD->textBold )->setPosition( 10, $row * $height );
	$MadGD->addText( $config['worlds'][$character->getWorld( )] )->setPosition( ); $row++;
	// Player Residence
	$MadGD->addText( 'Resid&ecirc;ncia:', $MadGD->textBold )->setPosition( 10, $row * $height );
	$MadGD->addText( $config['cities'][$character->getTownId( )] )->setPosition( ); $row++;
	// Player House
	$house = $SQL->query( 'SELECT `name`, `town` FROM `houses` WHERE `world_id` = '.$character->getWorld( ).' AND `owner` = '.$character->getId( ).';' )->fetch();
	if ( $house != null )
	{
		$MadGD->addText( 'Casa:', $MadGD->textBold )->setPosition( 10, $row * $height );
		if ( array_key_exists( $house['town'], $config['cities'] ) )
		{
			$MadGD->addText( $house['name'].' ('.$config['cities'][$house['town']].')' )->setPosition( ); $row++;
		}
		else
		{
			$MadGD->addText( $house['name'] )->setPosition( ); $row++;
		}
	}
	// Player Guild
	if ( $character->getRank() != null )
	{
		$MadGD->addText( 'Guilda:', $MadGD->textBold )->setPosition( 10, $row * $height );
		$MadGD->addText( $character->getRank()->getName().' of the '.$character->getRank()->getGuild()->getName() )->setPosition( ); $row++;
	}
	// Player Last Login
	$MadGD->addText( '&Uacute;ltimo login:', $MadGD->textBold )->setPosition( 10, $row * $height );
	$MadGD->addText( ( $character->getLastLogin() == 0 ? 'Nunca entrou!' : gmdate( 'M d Y, H:i:s T', $character->getLastLogin() ) ) )->setPosition( ); $row++;
	// Account Status
	$MadGD->addText( 'Status:', $MadGD->textBold )->setPosition( 10, $row * $height );
	$MadGD->addText( ( $character->getAccount()->getPremDays() > 0 ? 'Premium Account' : 'Free Account' ) )->setPosition( ); $row++;
	
	
	
	
	
	$time = time( );
	
	// Display the outcome of the generated signature.
	$MadGD->display( BASEPATH_SIGNATURE.'cache/'.$character->getId( ).'_'.$time.'.png' );
			
	// Send the headers.
	header( 'Content-type: image/png' );
	// Include the cache file.
	//include( BASEPATH_SIGNATURE.'cache/'.$character->getId( ).'_'.$time.'.png' );
	exit;
