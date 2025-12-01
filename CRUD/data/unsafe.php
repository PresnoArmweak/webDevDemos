<?php
    function unsafe_insert(){
  // NOTE: we intentionally do NOT escape or sanitize here — this is the unsafe pattern.
  $title  = "The Hobbit'); Drop table demo_books;-- ";
  $sql = "INSERT INTO demo_books (title) VALUES ('$title')";
  echo($sql);
}
unsafe_insert();