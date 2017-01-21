<?php 

// grab all feedback subject lines
function get_subject(){
	global $db;
    $query = 'SELECT * FROM feedback';
    $statement = $db->prepare($query);
    $statement->execute();
    $subjects = $statement->fetchAll();
    $statement->closeCursor();
    
    return $subjects;    
}

// add feedback
function add_feedback($feedback_firstName, $feedback_lastName, $feedback_subject, $feedback_text){
	global $db;
    $query = 'INSERT INTO feedback
                (feedback_firstName, feedback_lastName, feedback_subject, feedback_text)
                VALUES
                (:feedback_firstName, :feedback_lastName, :feedback_subject, :feedback_text)';
	
	$statement = $db->prepare($query);
	$statement->bindValue(':feedback_firstName', $feedback_firstName);
    $statement->bindValue(':feedback_lastName', $feedback_lastName);
    $statement->bindValue(':feedback_subject', $feedback_subject);
    $statement->bindValue(':feedback_text', $feedback_text);
    $statement->execute();
    $statement->closeCursor();
}

// grab the feedback by id
function get_feedback_by_id($feedback_id){
	global $db;
    $query = 'SELECT * FROM feedback
              WHERE feedbackID = :feedback_id';
    $statement = $db->prepare($query);
    $statement->bindValue(":feedback_id", $feedback_id);
    $statement->execute();
    $feedback = $statement->fetch();
    $statement->closeCursor();
    return $feedback;
}

// edit feedback
function edit_feedback($feedback_id, $feedback_firstName, $feedback_lastName, $feedback_subject, $feedback_text) {
    global $db;
    $query = 'UPDATE feedback
              SET feedbackID          = :feedback_id,
                  feedback_firstName  = :feedback_firstName,
                  feedback_lastName   = :feedback_lastName,
                  feedback_subject    = :feedback_subject,
                  feedback_text       = :feedback_text
              WHERE feedbackID        = :feedback_id';
    
    $statement = $db->prepare($query);
    $statement->bindValue(':feedback_id', $feedback_id);
    $statement->bindValue(':feedback_firstName', $feedback_firstName);
    $statement->bindValue(':feedback_lastName', $feedback_lastName);
    $statement->bindValue(':feedback_subject', $feedback_subject);
    $statement->bindValue(':feedback_text', $feedback_text);
    $statement->execute();
    $statement->closeCursor();
} 


?>