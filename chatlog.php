<div id="chatbox"><?php
if(file_exists("chatlog.html") && filesize("chatlog.html") > 0){
    $handle = fopen("chatlog.html", "r");
    $contents = fread($handle, filesize("chatlog.html"));
    fclose($handle);
     
    echo $contents;
}
?></div>