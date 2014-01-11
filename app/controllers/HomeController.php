<?php

class HomeController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
        // Random
        //User::order_by(DB::raw('RAND()'))->get();

        #$question = Question::find(rand(1,3));
        return View::make('desktop.home.index');
	}

    public function getGames()
    {
        return View::make('desktop.home.games');
    }

    public function getMovies()
    {
        // http://tutorial.apicultur.com/rest/1.0/pelis/actorimagen
        $movie = self::getData("http://tutorial.apicultur.com/rest/1.0/pelis/pelisactor");
        
        $image = '/uploads/'.md5($movie[0]['imagen']);
        $question = 'In which of these movies, '.$movie[0]['actor'].' acted?';
        
        File::put(public_path().'/uploads/'.md5($movie[0]['imagen']), fopen($movie[0]['imagen'], 'r'));

        $answersRaw = self::getData("http://tutorial.apicultur.com/rest/1.0/pelis/pelisnoactor?actor=".$movie[0]['actor']);

        $answers = array();
        foreach ($answersRaw as $answer) {
            $answers[] = $answer['titulo'];
        }

        $correctAnswer = rand(0,2);

        $answers[$correctAnswer] = $movie[0]['titulo'];

        return View::make('desktop.questions.show', compact('image', 'question', 'answers', 'correctAnswer'));    }

    public function getActors()
    {
        // http://tutorial.apicultur.com/rest/1.0/pelis/actorimagen
        $actor = self::getData("http://tutorial.apicultur.com/rest/1.0/pelis/actorimagen");

        $image = '/uploads/'.md5($actor[0]['imagen']);
        $question = 'Who is this actor?';
        
        File::put(public_path().'/uploads/'.md5($actor[0]['imagen']), fopen($actor[0]['imagen'], 'r'));

        $answersRaw = self::getData("http://tutorial.apicultur.com/rest/1.0/pelis/actoresdiferentes?actor='".$actor[0]['nombre']."'");

        $answers = array();
        foreach ($answersRaw as $answer) {
            $answers[] = $answer['nombre'];
        }

        $correctAnswer = rand(0,2);

        $answers[$correctAnswer] = $actor[0]['nombre'];

        return View::make('desktop.questions.show', compact('image', 'question', 'answers', 'correctAnswer'));
    }

    /**
     * asdadasdasdas asd asd a
     * @param type $url 
     * @return type
     */
    private function getData($url)
    {
        $ch = curl_init($url);                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));
         
        $result = curl_exec($ch);

        $result = json_decode($result, true);

        return $result['response'];
    }
}
