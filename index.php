<!DOCTYPE HTML>
<html>
<head>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: Ahmad khan
 * Date: 1/29/2019
 * Time: 12:15 AM
 */
//E _____ I

$question_array = array(array("When you are with a group of people, would you usually rather", "Join in the talk of the group, ", "Talk individually with people you know well?"));
array_push($question_array, array("When you have to meet strangers, do you find it ", "Pleasant, or at lease easy", " Something that takes a good deal of effort?"));
array_push($question_array, array("Are you", "Easy to get to know", "Hard to get to know"));
array_push($question_array, array("Do you tend to have", " Broad friendships with many different people", "Deep friendships with a very few people"));
array_push($question_array, array("At parties, do you", " Always have fun", "Sometimes get bored"));

//S _____ N
array_push($question_array, array("Do you usually get along better with", "Realistic people", "Imaginative people"));//2
array_push($question_array, array("If you were a teacher, would you rather teach", "Fact courses", "Courses involving theory?"));//6
array_push($question_array, array("Is it higher praise to say someone has", "Common sense,", "Vision "));//10
array_push($question_array, array("Would you rather have as a friend someone who", "Has both feet on the ground", " Is always coming up with new ideas"));//14
array_push($question_array, array("Would you rather be considered", "A practical person,", "An ingenious person"));//18

//T _____ F
array_push($question_array, array("Which word in the pair appeals to you more?", " Analyze", "Sympathize "));//3
array_push($question_array, array("Which word in the pair appeals to you more? ", "Foresight ", "  Compassion"));//7
array_push($question_array, array(" Which word in the pair appeals to you more?", " Firm ", " Gentle"));//11
array_push($question_array, array("Which word in the pair appeals to you more?", "Thinking ", "  Feeling"));//15
array_push($question_array, array(" Is it a higher compliment to be called", " A consistently reasonable person", "A person of real feeling?"));//19


//J _____ P
array_push($question_array, array("Does following a schedule ", "Appeal to you", "Cramp you "));//4
array_push($question_array, array("Do you prefer to", " Arrange dates, parties, etc., well in advance, or", " Be free to do whatever looks like fun when the time comes?"));//8
array_push($question_array, array("Does the idea of making a list of what you should get done over a weekend", "Appeal to you", "Leave you cold "));//12
array_push($question_array, array("When it is settled well in advance that you will do a certain thing at a certain time, do you find it", "Nice to be able to plan accordingly", " A little unpleasant to be tied down"));//16
array_push($question_array, array(" Is it harder for you to adapt to ", "Constant change", "Routine "));//20

function personality_type($arr)
{

    $personalaty_type = e_i($arr) . s_n($arr) . t_f($arr) . j_p($arr);
    ?>


    <script>alert("<?php echo "Pour Personalaty type is : ". $personalaty_type; ?>")</script>

    <?php
}


//Introverted or Extroverted

function e_i($arr)
{
    $e=0;
    for($i=0;$i<5;$i++){
        if($arr[$i]=="a"){
          $e++;
        }
        else {
            $e--;
        }
    }
    if($e>0){
        return "E";
    }
    else{
        return "I";
    }
}

//Sensing or Intuitive
function s_n($arr)
{
    $s=0;
    for($i=5;$i<10;$i++){
        if($arr[$i]=="a"){
            $s++;
        }
        else {
            $s--;
        }
    }
    if($s>0){
        return "S";
    }
    else{
        return "N";
    }
}

//Thinking or Feeling
function t_f($arr)
{
    $t=0;
    for($i=10;$i<15;$i++){
        if($arr[$i]=="a"){
            $t++;
        }
        else {
            $t--;
        }
    }
    if($t>0){
        return "T";
    }
    else{
        return "F";
    }
}

// Judging or Perceptive
function j_p($arr)
{
    $j=0;
    for($i=15;$i<20;$i++){
        if($arr[$i]=="a"){
            $j++;
        }
        else {
            $j--;
        }
    }
    if($j>0){
        return "J";
    }
    else{
        return "P";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $check=true;
    for ($i = 0; $i < sizeof($question_array); $i++) {
        $arr[$i]= $_POST["question" . $i];
        if(!empty($arr[$i])){
$check=false;
            ?>
            <script>alert("<?php echo "Answer All the questions "?>")</script>
<?php
            break;
        $arr[$i]= $_POST["question" . $i];
        }
    }
    if($check) {
        personality_type($arr);
    }
}


?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <h1>Personality Type Identification Test <br> </h1>
    <?php
    for ($i = 0; $i < sizeof($question_array); $i++) {

        ?>

        <h3><?php   echo ($i+1)." :"; echo $question_array[$i][0]; ?></h3>
        <input type="radio" name="question<?php echo $i ?>" value="a"><?php echo $question_array[$i][1]; ?>
        <input type="radio" name="question<?php echo $i ?>" value="b"><?php echo $question_array[$i][2]; ?>

        <?php
    }
    ?>
    <br>
    <br>
    <br>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>


</body>
</html>
