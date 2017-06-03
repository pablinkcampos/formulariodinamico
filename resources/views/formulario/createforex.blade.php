@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Crear Formulario Exclusivo</div>
				<div class="panel-body">
					@if (session('status'))
						<div class="alert alert-success">
							{{ session('status') }}
						</div>
					@endif

					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					{{ $var=4 }}

     <form action="submit.php" method="post" accept-charset="utf-8">
	<div id="questions">
	<!--This will hold the question -->
	</div>

	<p><button id="addQuestion">Add Question</button></p>

	<p><input type="submit" value="Continue &rarr;"/></p>
</form>

<div id="masterQuestion">
	<!-- This is the hidden master content used for cloning -->
	

	<div id="type1" class="questionSet">
		<h3>Type 1</h3>
		<p><label>Question: </label><input type="text" class="dynamic" name="question[*][question]" /></p>
		<p><label>Answer: </label><input type="text" class="dynamic" name="question[*][answer]" /></p>
	</div>

	
    <script type="text/javascript">
            $(document).ready(function() {

	//set up the 'Add New Question' button


	for (i=0;i<4;i++){ 
  			 	
   				
   				for (j=0;j<4;j++){ 
   						$('#addQuestion').click(function(e){
		//prevent the button from submitting the form
		e.preventDefault();

		

		//get the new question number
		var questionNumber = $('.question').length + 1;

		//clone the master questionChanger and 'type1' question (we need to remove the ID from the questionType - we don't need it)
		var questionChanger = $('#masterQuestion .questionChanger').clone(true);
		var questionType = $('#type1').clone().removeAttr('id');

		//create a new wrapper for the new question, set the question number (used later), add a class, and add the new content to it
		var newQuestion = $('<div>').data('qNum', questionNumber).addClass('question').append(questionChanger, questionType);

		//now loop through the '.dynamic' elements so we can change the name
		$('.dynamic', newQuestion).each(function() {
			//get the old dummy name
			var oldName = $(this).attr('name');

			//replace the dummy text (*) with the question number
			$(this).attr('name', oldName.replace('*', questionNumber));
		})

		//add the new question to the #questions DIV
		newQuestion.appendTo('#questions');
	});
      			
   				}			 
   				
		}; 


	//set up the 'Question Type' changer
	$('.questionChanger select').change(function() {
		//what type of question are we cloning (match the values of the dropdown to the IDs of the master question types)
		var newQuestionType = $('#' + $(this).val()).clone().removeAttr('id');

		//get the question number (this time from the data-qNum attribute)
		var questionNumber = $(this).parents('.question').data('qNum');

		//loop through the new question and change the name of all the '.dynamic' elements
		$(newQuestionType).find('.dynamic').each(function(){
			//get the old dummy name
			var oldName = $(this).attr('name');

			//replace the dummy text (*) with the question number (this time from the data-qNum attribute)
			$(this).attr('name', oldName.replace('*', questionNumber));
		})

		//now add the new question type
		$(this).parents('.question').find('.questionSet').html(newQuestionType);
	});

});
    </script>
</div>
</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
