<?php
$con = mysqli_connect( 'localhost', 'alicheaib', 'alicheaib1', 'security server' );
if ( !empty( $senderid ) ) {
    if ( isset( $_POST['sender'] ) ) {
        $senderid = $_POST['sender'];
    }
}

// Check connection
if ( mysqli_connect_errno() )
 {
    echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
}
if ( !empty( $senderid ) ) {
    # code...
    $sql = "SELECT * from 'notification'  where poice like '".$senderid."';";
}
if ( !empty( $result ) ) {
    if ( $result = mysqli_query( $con, $sql ) )
 {
        $emparray = array();
        while( $row = mysqli_fetch_assoc( $result ) )
        $emparray[] = $row;

        echo( json_encode( $emparray ) );

        // Free result set
        mysqli_free_result( $result );
    }
}
mysqli_close( $con );

?>