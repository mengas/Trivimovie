<section id="question">
    <div class="row">
        <div class="col-lg-12 text-center">
            {{ HTML::image($image, $answers[$correctAnswer], ['class' => 'quiz-img img-thumbnail img-circle']) }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1 class="quiz-title text-center">
                {{ $question }}
            </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <ul class="list-unstyled text-center quiz-options">
                <?php $i = 0; ?>
                @foreach ($answers as $answer)
                    <li>
                        <label class="radio">
                            <input type="radio" name="answer" value="{{ $i }}">
                            {{ $answer }}
                        </label>
                        <div class="status"></div>
                    </li>
                <?php $i++; ?>
                @endforeach
            </ul>
        </div>
    </div>

    <input type="hidden" name="correctAnswer" value="{{ $correctAnswer }}">
    <button class="hidden remote-load-trigger" data-src="/actors">NEXT</button>
</section>