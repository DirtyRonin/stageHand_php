<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->id();
            $table->string('artist');
            $table->string('title');
            $table->boolean('nineties');
            $table->boolean('evergreen');
            $table->string('originalKey')->nullable();
            $table->string('comment')->nullable();
            $table->string('genre')->nullable();
            $table->timestamps();

            $table->index(['artist', 'title', 'genre','nineties','evergreen']);
        });
        
        $songs = simplexml_load_string(xml) or die("Error: Cannot create object");

        $newSongs = array();

        foreach ($songs as $key => $value) {
            array_push($newSongs, [
                'artist' => $value->Artist,
                'title' => $value->Title,
                'nineties' => $value->Nineties,
                'evergreen' => $value->Evergreen,
                'originalKey' => $value->OriginalKey,
                'comment' => $value->Comment,
                'genre' => $value->Genre,
            ]);
        }

        DB::table('songs')->insert($newSongs);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}


const xml = '<?xml version="1.0" encoding="UTF-8"?>
<Songs>
  <Song>
    <Artist>2 Unlimited</Artist>
    <Title>No Limit</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Instr./Jingles</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>4 non Blondes</Artist>
    <Title>What’s up?</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>4 the Cause</Artist>
    <Title>Stand By Me</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>Ben E. King</Comment>
  </Song>
  <Song>
    <Artist>Absolute Beginner</Artist>
    <Title>Liebes Lied</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Absolute Beginner</Artist>
    <Title>Irgendwie irgendwo irgendwann</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Ace of Base</Artist>
    <Title>All that she wants</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Ace of Base</Artist>
    <Title>The Sign</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Ace of Base</Artist>
    <Title>Wheel of Fortune</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Adiemus</Artist>
    <Title>Adiemus</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Instr./Jingles</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Aerosmith</Artist>
    <Title>Crazy</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Aerosmith</Artist>
    <Title>I don’t want to miss a thing</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Aerosmith</Artist>
    <Title>Crying</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey>Gm, A</OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Alanis Morissette</Artist>
    <Title>Ironic</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Alanis Morissette</Artist>
    <Title>You learn</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Alanis Morissette</Artist>
    <Title>Head over Feet</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Alanis Morissette</Artist>
    <Title>You oughta know</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>All-4-One</Artist>
    <Title>I swear</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Andru Donalds</Artist>
    <Title>Mishale</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Annie Lennox</Artist>
    <Title>No more I love yous</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Aqua</Artist>
    <Title>Barbie Girl</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Aqua</Artist>
    <Title>Ibiza (Barbados)</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Backstreet Boys</Artist>
    <Title>I’ll never break your heart</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Backstreet Boys</Artist>
    <Title>We’ve got it going on</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Backstreet Boys</Artist>
    <Title>Backstreet’s back</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Backstreet Boys</Artist>
    <Title>Quit playing games</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Backstreet Boys</Artist>
    <Title>As long as you love me</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Backstreet Boys</Artist>
    <Title>I want it that way</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Beck</Artist>
    <Title>Loser (?)</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Bell Book and Candle</Artist>
    <Title>Rescue me</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Bellini</Artist>
    <Title>Samba de Janeiro</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Tanz</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Blink 182</Artist>
    <Title>All the small things</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Blondie</Artist>
    <Title>Maria</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Bloodhound Gang</Artist>
    <Title>Fire Water Burn</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Bloodhound Gang</Artist>
    <Title>Along comes Mary</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Bloodhound Gang</Artist>
    <Title>The Bad Touch</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Blümchen</Artist>
    <Title>Boomerang</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Blümchen</Artist>
    <Title>Herz an Herz</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Blümchen</Artist>
    <Title>Piep, piep (Kleiner Satellit)</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Blur </Artist>
    <Title>Coffee and TV</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Blur </Artist>
    <Title>Country House</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Blur </Artist>
    <Title>Song 2</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Bon Jovi</Artist>
    <Title>Bed of Roses</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Bon Jovi</Artist>
    <Title>It’s my life</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Bon Jovi</Artist>
    <Title>Keep te Faith</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Bon Jovi</Artist>
    <Title>Always</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Boyz II Men</Artist>
    <Title>End oft he Road</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Boyz II Men</Artist>
    <Title>I’ll make Love to you</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Boyzone</Artist>
    <Title>No Matter What</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Boyzone</Artist>
    <Title>Picture Of You</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Boyzone</Artist>
    <Title>Father And Son</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>Cat Stevens Cover</Comment>
  </Song>
  <Song>
    <Artist>Bryan Adams</Artist>
    <Title>Summer of 69</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Bryan Adams</Artist>
    <Title>(Everything I do) I do it for you</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Bryan Adams</Artist>
    <Title>Please forgive me</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Bryan Adams</Artist>
    <Title>All for Love (featr Rod Stewart &amp; Sting)</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Bürger Lars Dietrich</Artist>
    <Title>Ein Bett im Kornfeld</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>Jürgen Drews</Comment>
  </Song>
  <Song>
    <Artist>Bürger Lars Dietrich</Artist>
    <Title>Sexy Eis</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment>Klamauk</Comment>
  </Song>
  <Song>
    <Artist>Bush</Artist>
    <Title>Swallowed</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>C-Block</Artist>
    <Title>So strung out</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Celine Dion</Artist>
    <Title>My heart will go on</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Cher</Artist>
    <Title>The Shoop shoop song</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Cher</Artist>
    <Title>Believe</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Christina Aguilera</Artist>
    <Title>Genie in a bottle</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Coolio</Artist>
    <Title>Gangstas Paradise</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>Stevie Wonder</Comment>
  </Song>
  <Song>
    <Artist>Cranberries</Artist>
    <Title>Zombie</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Crash Test Dummies</Artist>
    <Title>Mmm Mmm Mmm Mmm</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Creme 21</Artist>
    <Title>Wann wird’s mal wieder richtig Sommer</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>Rudi Carell</Comment>
  </Song>
  <Song>
    <Artist>Deep Blue Something</Artist>
    <Title>Breakfast at Tiffany’s</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Depeche Mode</Artist>
    <Title>Enjoy the Silence</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Depeche Mode</Artist>
    <Title>Walk in my shoes</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Die Ärzte</Artist>
    <Title>Schrei nach Liebe</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Die Ärzte</Artist>
    <Title>Hurra (?)</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Die Ärzte</Artist>
    <Title>Ein Song namens Schunder</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Die Ärzte</Artist>
    <Title>3-Tage-Bart</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Die Ärzte</Artist>
    <Title>Mach die Augen zu und küss mich</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Die Doofen</Artist>
    <Title>Mief</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Die Fantastischen 4</Artist>
    <Title>Sie ist weg</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Die Fantastischen 5</Artist>
    <Title>Die da</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Die Prinzen</Artist>
    <Title>Alles nur geklaut</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Die Prinzen</Artist>
    <Title>Küssen verboten</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Die Prinzen</Artist>
    <Title>Du musst ein Schwein sein</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Die Prinzen</Artist>
    <Title>Ich wär so gerne Millionär</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Die Schröders</Artist>
    <Title>Saufen</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Die Toten Hosen</Artist>
    <Title>Alles aus Liebe</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Die Toten Hosen</Artist>
    <Title>Zehn kleine Jägermeister</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Die Toten Hosen</Artist>
    <Title>Sascha, ein aufrechter Deutscher</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Die Toten Hosen</Artist>
    <Title>Bonny &amp; Clyde</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>DJ Bobo</Artist>
    <Title>Somebody dance with me</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>DJ Bobo</Artist>
    <Title>Everybody</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>DJ Bobo</Artist>
    <Title>Freedom</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>DJ Bobo</Artist>
    <Title>Pray</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>DUNE</Artist>
    <Title>Forever Young</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>Alphaville</Comment>
  </Song>
  <Song>
    <Artist>E-Rotic</Artist>
    <Title>Max Don’t Have Sex with Your Ex</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment>evtl Medley mit allen E-Rotic-Hits</Comment>
  </Song>
  <Song>
    <Artist>E-Rotic</Artist>
    <Title>Fred Come to Bed</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>E-Rotic</Artist>
    <Title>Sex on the Phone</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>E-Rotic</Artist>
    <Title>Willy Use a Billy ... Boy</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>E-Rotic</Artist>
    <Title>Fritz love My Tits</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>East17</Artist>
    <Title>Alright</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>ECHT</Artist>
    <Title>Du trägst keine Liebe in dir</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>ECHT</Artist>
    <Title>Junimond</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>cover/OriginalKey</Genre>
    <Comment>Rio Reiser</Comment>
  </Song>
  <Song>
    <Artist>Echt</Artist>
    <Title>Du trägst keine Liebe in dir</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Echt</Artist>
    <Title>Weinst du?</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Eiffel 65</Artist>
    <Title>Blue (da Ba Dee)</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Elton John</Artist>
    <Title>Circle of Life</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Elton John</Artist>
    <Title>Can you feel the love tonight</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Elton John</Artist>
    <Title>Candle in the Wind</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment>Prinzessin Dianas Tod: 1997</Comment>
  </Song>
  <Song>
    <Artist>Elton John</Artist>
    <Title>Something about the way you look tonight</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Emilia</Artist>
    <Title>Big Big World</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>En Vogue</Artist>
    <Title>Don’t let go</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Enigma</Artist>
    <Title>Return to Innocence</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Instr./Jingles</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Erasure</Artist>
    <Title>Always</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Espen Lind</Artist>
    <Title>When Susanna Cries</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Everlast</Artist>
    <Title>What it&apos;s like</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Everything but the Girl</Artist>
    <Title>Missing</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Extreme</Artist>
    <Title>More than words</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Faithless</Artist>
    <Title>Insomnia</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Instr./Jingles</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Falco</Artist>
    <Title>Out of the dark</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Fettes Brot</Artist>
    <Title>Jein</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Filmmusik / Film</Artist>
    <Title>I will always love you – Whitney Houston</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Filmmusik / Film</Artist>
    <Title>König der Löwen (s. Elton John)</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Five</Artist>
    <Title>Everybody get up</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>&quot;I love Rock&apos;n&apos;Roll&quot; - Joan Jett/The ArSongs</Comment>
  </Song>
  <Song>
    <Artist>Foo Fighters</Artist>
    <Title>Learn to fly</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Foo Fighters</Artist>
    <Title>My Hero</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Foo Fighters</Artist>
    <Title>Everlong</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Foo Fighters</Artist>
    <Title>Monkey Ranch</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Fool’s Garden</Artist>
    <Title>Lemon Tree</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Frank Zander</Artist>
    <Title>Hier kommt Kurt</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Freundeskreis</Artist>
    <Title>Mit dir (feat Joy Denalane)</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Freundeskreis</Artist>
    <Title>A-N-N-A</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Freundeskreis</Artist>
    <Title>Halt dich an deiner Liebe fest</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>Rio Reiser</Comment>
  </Song>
  <Song>
    <Artist>Fugees</Artist>
    <Title>Killing Me Softly</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>Roberta Flack</Comment>
  </Song>
  <Song>
    <Artist>Fugees</Artist>
    <Title>Ready or not</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Instr./Jingles</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Fun Factory</Artist>
    <Title>Doo Wah Diddy</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>Manfred Mann</Comment>
  </Song>
  <Song>
    <Artist>Genesis</Artist>
    <Title>Jesus he knows me</Title>
    <Nineties>false</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre></Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Genesis</Artist>
    <Title>I can’t dance</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Green Day</Artist>
    <Title>Basket Case</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Green Day</Artist>
    <Title>When I come around</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Green Day</Artist>
    <Title>Good Riddance</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment>heute Beerdigungssong in USA</Comment>
  </Song>
  <Song>
    <Artist>Guildo Horn</Artist>
    <Title>Guidlo hat euch lieb</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Haddaway</Artist>
    <Title>What is Love</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Hanson </Artist>
    <Title>Mmmbop</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Helge Schneider</Artist>
    <Title>Katzeklo</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment>Klamauk</Comment>
  </Song>
  <Song>
    <Artist>Herbert Grönemeyer</Artist>
    <Title>Land unter</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Herbert Grönemeyer</Artist>
    <Title>Bleibt alles anders</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Inner Circle</Artist>
    <Title>Sweat (Alalalalong)</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Israel Kamikawao&apos;ole</Artist>
    <Title>Somewhere Over The Rainbow</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>Judy Garland</Comment>
  </Song>
  <Song>
    <Artist>J-Lo</Artist>
    <Title>End oft he Road</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>J-Lo</Artist>
    <Title>I’ll make Love to you</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Jeff Buckley</Artist>
    <Title>Hallelujah</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>Lehonard Cohen</Comment>
  </Song>
  <Song>
    <Artist>Joan Osborne</Artist>
    <Title>One of us</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Jon Secada</Artist>
    <Title>Just another day</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Joshua Kadison</Artist>
    <Title>Jessie</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Kate Yanai</Artist>
    <Title>Bacardi Feeling</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>La Bouche</Artist>
    <Title>Be my Lover</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Lighthouse Family</Artist>
    <Title>Lifted</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Lighthouse Family</Artist>
    <Title>Ocean Drive</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Lighthouse Family</Artist>
    <Title>High</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Lighthouse Family</Artist>
    <Title>Goodbye Heartbreak</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Lionel Ritchie</Artist>
    <Title>Hello</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Londonbeat</Artist>
    <Title>I’ve been thinking about you</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Loona</Artist>
    <Title>Bailando</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Los Del Rio</Artist>
    <Title>Macarena</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Tanz</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Lou Bega</Artist>
    <Title>Mambo Nr 5</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Lucilectric</Artist>
    <Title>Mädchen</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Lutricia McNeal</Artist>
    <Title>Ain’t that just the way</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Madonna</Artist>
    <Title>Frozen</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Madonna</Artist>
    <Title>Human Nature (?)</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Madonna</Artist>
    <Title>American Pie</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>Don McLean</Comment>
  </Song>
  <Song>
    <Artist>Magic Affair</Artist>
    <Title>Omen III</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Instr./Jingles</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Manic Street Preachers</Artist>
    <Title>And if you tolerate this then your children will be next</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Manic Street Preachers</Artist>
    <Title>A design for life</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Mariah Carey</Artist>
    <Title>Without you</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Marky Mark feat Prince Ital Joe</Artist>
    <Title>United (?)</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Marusha</Artist>
    <Title>Somewhere Over The Rainbow</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>Judy Garland</Comment>
  </Song>
  <Song>
    <Artist>Madness</Artist>
    <Title>Our House</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Matthias Reim</Artist>
    <Title>Verdammt, ich lieb dich</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Matze Knop</Artist>
    <Title>Supa Richie</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment>Klamauk</Comment>
  </Song>
  <Song>
    <Artist>Maxi Priest</Artist>
    <Title>Close to you</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment>nur Refrain?</Comment>
  </Song>
  <Song>
    <Artist>Meat Loaf </Artist>
    <Title>I would do anything for love</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Members of Mayday</Artist>
    <Title>Sonic Empire</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Instr./Jingles</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Metallica</Artist>
    <Title>Nothing Else Matters</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Metallica</Artist>
    <Title>The UnforgivenII</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Metallica</Artist>
    <Title>Enter Sandman</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Michael Jackson</Artist>
    <Title>Man in the mirror</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Michael Jackson</Artist>
    <Title>Heal the World</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Michael Jackson</Artist>
    <Title>Black or White</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Michael Jackson</Artist>
    <Title>You are not alone</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Michael Jackson</Artist>
    <Title>Earth Song</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Michael Jackson</Artist>
    <Title>They don’t care about us</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Mr Big</Artist>
    <Title>To be with you</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Mr Ed jumps the Gun</Artist>
    <Title>Don’t Haha</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Mr President</Artist>
    <Title>Coco Jambo</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Mr President</Artist>
    <Title>I give you my heart</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Natalie Imbruglia</Artist>
    <Title>Torn</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Neneh Cherry &amp; Youssou NDour</Artist>
    <Title>7 seconds</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Nick Cave &amp; Kylie Minogue</Artist>
    <Title>Where the wild roses gSong</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Nick Kamen</Artist>
    <Title>I promised myself</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Nirvana</Artist>
    <Title>Smells like Teen Spirit</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Nirvana</Artist>
    <Title>Come as you are</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>N&apos;Sync</Artist>
    <Title>Bye bye bye</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>N&apos;Sync</Artist>
    <Title>Tearin&apos; up my heart</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>No Doubt</Artist>
    <Title>Don’t Speak</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>No Mercy</Artist>
    <Title>Where do you go</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Ö La Palöma Boys</Artist>
    <Title>Ö La Palöma</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment>Klamauk</Comment>
  </Song>
  <Song>
    <Artist>Oasis</Artist>
    <Title>Wonderwall</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Oasis</Artist>
    <Title>Don’t look back in anger</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Oasis</Artist>
    <Title>Live forever</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Oli P.</Artist>
    <Title>Flugzeuge im Bauch</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>Herbert Grönemeyer</Comment>
  </Song>
  <Song>
    <Artist>Paul McCartney</Artist>
    <Title>Hope of Deliverance</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Pe Werner</Artist>
    <Title>Kribbeln im Bauch</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Pet Shop Boys</Artist>
    <Title>Go West</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Peter André</Artist>
    <Title>Mysterious Girl</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Peter Maffay</Artist>
    <Title>Nessajas Lied</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Prince</Artist>
    <Title>Gold</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Prince</Artist>
    <Title>The Most Beautiful Girl in the World</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Prince Ital Jow</Artist>
    <Title>Happy People</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Instr./Jingles</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Puff Daddy</Artist>
    <Title>Godzilla (Come with me)</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Instr./Jingles</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Pulp</Artist>
    <Title>Common People</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Pulp</Artist>
    <Title>Disco 2000</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>PUR</Artist>
    <Title>Abenteuerland</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>PUR</Artist>
    <Title>Ich lieb Dich</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>PUR</Artist>
    <Title>Ein graues Haar</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>PUR</Artist>
    <Title>Wenn du da bist</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>PUR</Artist>
    <Title>Lena</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Queen</Artist>
    <Title>The show must go on </Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Queen</Artist>
    <Title>Heaven for Everyone</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>R. Kelly</Artist>
    <Title>I believe I can fly</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>R.E.M.</Artist>
    <Title>Losing my religion</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>R.E.M.</Artist>
    <Title>Shiny happy people</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Radiohead</Artist>
    <Title>Creep</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Rammstein</Artist>
    <Title>Engel</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Red Hot Chilli Peppers</Artist>
    <Title>Under the Bridge</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Red Hot Chilli Peppers</Artist>
    <Title>Scar tissue</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Red Hot Chilli Peppers</Artist>
    <Title>Otherside</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Red Hot Chilli Peppers</Artist>
    <Title>Californication</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Rednex</Artist>
    <Title>Cotton Eye Joe</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Rednex</Artist>
    <Title>Wish you were here</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Ricky Martin</Artist>
    <Title>Livin‘ la vida loca</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Right said Fred</Artist>
    <Title>Don’t talk just kiss</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Roxette</Artist>
    <Title>How do you do</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Roxette</Artist>
    <Title>Sleeping in my car</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Roxette</Artist>
    <Title>It must have been love</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Roxette</Artist>
    <Title>Joyride</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Santana &amp; Rob Thomas</Artist>
    <Title>Smooth</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Savage Garden</Artist>
    <Title>Truly madly deeply</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Scatman John</Artist>
    <Title>Scatman</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Scooter</Artist>
    <Title>Hyper Hyper</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Instr./Jingles</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Seal</Artist>
    <Title>Kiss from a Rose</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Selig</Artist>
    <Title>Ohne Dich </Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Selig</Artist>
    <Title>Wenn ich wollte</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Mila</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Die Kickers</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Sailor Moon</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Die Schlümpfe</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Gummibärenbande</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Chip und Chap</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Inspector Gadget</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Cool Mc Cool</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Darkwin Duck</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Ducktales</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Full House</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Eine schrecklich nette Familie (Sinatra)</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Saber Rider</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Love Boat</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Pinky und der Brain</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Doctor Snuggles</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Neues vom Süderhof</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Flipper</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Biene Maja</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Friends</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Kings of Queens</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Baywatch</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment>1989-2001, also überwiegend 90er</Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Prinz of Bel Air</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Gute Zeiten schlechte Zeiten</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Serien-Musik </Artist>
    <Title>Käptn Balu</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Shaggy</Artist>
    <Title>Mr Boombastic</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Instr./Jingles</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Shakespeare Sisters</Artist>
    <Title>Hello turn your radio on</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Shania Twain</Artist>
    <Title>That don’t impress me much</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Sinead o’Connor</Artist>
    <Title>Nothing compares to you</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Skunk Anansie</Artist>
    <Title>Hedonism</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Skunk Anansie</Artist>
    <Title>Weak</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>SmashMouth</Artist>
    <Title>Allstar</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Snap!</Artist>
    <Title>Rhythm is a dancer</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Snap!</Artist>
    <Title>The Power</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Instr./Jingles</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Soul Asylum</Artist>
    <Title>Runaway Train</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Spice Girls</Artist>
    <Title>Say you’ll be there</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Spice Girls</Artist>
    <Title>Wannabe</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Spice Girls</Artist>
    <Title>Stop</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Spice Girls</Artist>
    <Title>2 become 1</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment>XMAS tauglich</Comment>
  </Song>
  <Song>
    <Artist>Spice Girls</Artist>
    <Title>Spice up your life</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Spice Girls</Artist>
    <Title>Who do you think you are</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Spice Girls</Artist>
    <Title>Mama</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment>XMAS tauglich</Comment>
  </Song>
  <Song>
    <Artist>Spice Girls</Artist>
    <Title>Too Much</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment>XMAS tauglich</Comment>
  </Song>
  <Song>
    <Artist>Spin Doctors</Artist>
    <Title>Two princes</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Stefan Raab</Artist>
    <Title>Maschendrahtzaun</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Stefan Raab</Artist>
    <Title>Bööörty Vogts</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Supergrass</Artist>
    <Title>Alright</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Take That</Artist>
    <Title>Back For Good</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Take That</Artist>
    <Title>Never Forget</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Take That</Artist>
    <Title>How Deep Is Your Love</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment>Bee Gees Cover</Comment>
  </Song>
  <Song>
    <Artist>Take That</Artist>
    <Title>Relight My Fire</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>The Cardigans</Artist>
    <Title>Lovefool</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>The Connells</Artist>
    <Title>74-75</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>The Offspring</Artist>
    <Title>Pretty Fly for a white guy</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>The Offspring</Artist>
    <Title>Self Esteem</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>The Soultans</Artist>
    <Title>Hard it through the Grapevine</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>Marvin Gaye</Comment>
  </Song>
  <Song>
    <Artist>The Verve</Artist>
    <Title>The drugs don’t work</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Tic Tac Toe</Artist>
    <Title>Ich find dich scheiße</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Tic Tac Toe</Artist>
    <Title>Warum?</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Tic Tac Toe</Artist>
    <Title>Mr. Wichtig</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Tic Tac Toe</Artist>
    <Title>Verpiss dich</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>TLC</Artist>
    <Title>No Scrubs</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment>singability checken</Comment>
  </Song>
  <Song>
    <Artist>TLC</Artist>
    <Title>Waterfalls</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment>singability checken</Comment>
  </Song>
  <Song>
    <Artist>Toni Braxton</Artist>
    <Title>Unbreak my heart</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Torfrock</Artist>
    <Title>Beinhart</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Travis</Artist>
    <Title>Why does it always rain on me</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Twenty 4 Seven feat Captain Hollywood</Artist>
    <Title>I can’t stand it</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Instr./Jingles</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>U96</Artist>
    <Title>Das Boot</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Instr./Jingles</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>UB40</Artist>
    <Title>Can&apos;t Help Falling In Love</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>Elvis Presley</Comment>
  </Song>
  <Song>
    <Artist>Ugly Kid Joe</Artist>
    <Title>Cats in the Cradle</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Ugly Kid Joe</Artist>
    <Title>Everything about you</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Vaya con Dios</Artist>
    <Title>Nah Neh Nah</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Venga Boys</Artist>
    <Title>Boom boom boom</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Werbung</Artist>
    <Title>Merci</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Werbung</Artist>
    <Title>McDonald&apos;s</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment>Einfach gut…</Comment>
  </Song>
  <Song>
    <Artist>Werbung</Artist>
    <Title>Zott</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment>Hinein ins Weekend Feeling</Comment>
  </Song>
  <Song>
    <Artist>Werbung</Artist>
    <Title>Allianz</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Specials</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Westernhagen</Artist>
    <Title>Freiheit</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Westernhagen</Artist>
    <Title>Lass uns leben</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Westernhagen</Artist>
    <Title>Wieder hier</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Westernhagen</Artist>
    <Title>Es geht mir gut</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Westernhagen</Artist>
    <Title>Willenlos</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Westernhagen</Artist>
    <Title>Schweigen ist feige</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Whigfield</Artist>
    <Title>Saturday Night</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Trash</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Whitney Houston</Artist>
    <Title>Higher Love</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Whitney Houston</Artist>
    <Title>I’m every Woman </Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Whitney Houston</Artist>
    <Title>My Love is your love</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Witt/Heppner</Artist>
    <Title>Die Flut</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Wyclef Jean</Artist>
    <Title>Guantanamera</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Cover/OriginalKey</Genre>
    <Comment>Traditional / Ein Rudi Völler (!)</Comment>
  </Song>
  <Song>
    <Artist>Wyclef Jean</Artist>
    <Title>Gone till November</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Wyclef Jean</Artist>
    <Title>911</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Xavier Naidoo</Artist>
    <Title>1000 Kilometer über dem Meer</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Xavier Naidoo</Artist>
    <Title>Nicht von dieser Welt</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Xavier Naidoo</Artist>
    <Title>Sie sieht mich nicht</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>deutschspr.</Genre>
    <Comment></Comment>
  </Song>
  <Song>
    <Artist>Zucchero feat Paul Young</Artist>
    <Title>Senza und Donna</Title>
    <Nineties>true</Nineties>
    <Evergreen>false</Evergreen>
    <OriginalKey></OriginalKey>
    <Genre>Rock/Pop</Genre>
    <Comment></Comment>
  </Song>
</Songs>';
