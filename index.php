<?php
$tok = '1391161450:AAG-1SnylDUWVbHse8h_96qFya57GPFcjeg';

$update = file_get_contents('php://input');
$update = json_decode($update, true);

$mid = $update['message']['message_id'];
$uid = $update['message']['from']['id'];
$fname = $update['message']['from']['first_name'];
$lname = $update['message']['from']['last_name'];
$uname = $update['message']['from']['username'];
$text = $update['message']['text'];
$fullname = ''.$fname.''.$lname.'';
 $message = "<b>Hey! $fullname,\nI am Nat[Natasha] \nI Will Help You In Checking Your Account Info And Including Your Id... \nType /info To Get Your Account Info\nBot Made By => @Anonymous_Vip2 \n</b>";


$ch2 = curl_init( ); 
curl_setopt($ch2, CURLOPT_URL, "https://api.telegram.org/bot1391161450:AAG-1SnylDUWVbHse8h_96qFya57GPFcjeg/getChatMembersCount?chat_id=1391161450"); 
curl_setopt($ch2, CURLOPT_POST, false); 
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1); 
$output2 = curl_exec($ch2); 
$json2 = json_decode($output2,true);
curl_close($ch2);
$tot = $json2['result'];
echo $output2;


if ($text == '/start') {


$keyboard = [
    'inline_keyboard' => [
        [
            ['text' => 'Feedback Us', 'url' => 'http://t.me/Thugscripts_help_bot']
        ]
    ]
];
$encodedKeyboard = json_encode($keyboard);
    $post = [
        'chat_id' => ''.$uid.'',
        'text' => ''.$message.'',
        'parse_mode' => 'HTML',
        'reply_to_message_id'=>''.$mid.'',
        'reply_markup' => $encodedKeyboard
    ];
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,"https://api.telegram.org/bot".$tok."/sendMessage?");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $post);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
$response = curl_exec($curl);


}


elseif ($text == '/info') {
	$mas = urlencode("
<b>'''' YOUR INFO ''''</b>
<b>ꜰɪʀsᴛ ɴᴀᴍᴇ</b> => $fname
<b>ʟᴀsᴛ ɴᴀᴍᴇ</b> => $lname
<b>ɪᴅ </b> =><code> $uid</code>
<b>ᴜsᴇʀɴᴀᴍᴇ</b> => @$uname
<b>ᴜsᴇʀ ʟɪɴᴋ</b> => <a href='t.me/$uname'>Link</a>
");
$ch = curl_init( ); 
curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot$tok/sendMessage?chat_id=$uid&reply_to_message_id=$mid&text=$mas&parse_mode=HTML"); 
curl_setopt($ch, CURLOPT_POST, false); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
$output = curl_exec($ch); 
$json1 = json_decode($output,true);
curl_close($ch);
echo $output;
}

elseif ($text == '/stats') {
		if ($uid == '801636048') {
			$hour = date('H');
			$dayTerm = ($hour > 17) ? "Evening" : (($hour > 12) ? "Afternoon" : "Morning");
			$mess =  "<b><u>Total User => $tot</u></b>";

	$post1 = [
        'chat_id' => ''.$uid.'',
        'text' => ''.$mess.'',
        'parse_mode' => 'HTML',
        'reply_to_message_id'=>''.$mid.'',
    ];

	 $curl1 = curl_init();
    curl_setopt($curl1, CURLOPT_URL,"https://api.telegram.org/bot".$tok."/sendMessage?");
    curl_setopt($curl1, CURLOPT_POST, 1);
    curl_setopt($curl1, CURLOPT_POSTFIELDS, $post1);
    curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl1, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl1, CURLOPT_SSL_VERIFYPEER, 0);
$response1 = curl_exec($curl1);
echo $response1;

	}
	else{
		$messa = "<b>This Command Can Only Be Access By my Master You Noob..</b>";
		$post1 = [
        'chat_id' => ''.$uid.'',
        'text' => ''.$messa.'',
        'parse_mode' => 'HTML',
        'reply_to_message_id'=>''.$mid.'',
    ];
			 $curl1 = curl_init();
    curl_setopt($curl1, CURLOPT_URL,"https://api.telegram.org/bot".$tok."/sendMessage?");
    curl_setopt($curl1, CURLOPT_POST, 1);
    curl_setopt($curl1, CURLOPT_POSTFIELDS, $post1);
    curl_setopt($curl1, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl1, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl1, CURLOPT_SSL_VERIFYPEER, 0);
$response1 = curl_exec($curl1);
echo $response1;

	}
}

else{
	echo "Not a Good Command";
}
?>
