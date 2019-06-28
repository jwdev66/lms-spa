<?php

namespace Tests\Feature;

use App\Events\IdeaApproved;
use App\Events\IdeaSubmitted;
use App\Idea;
use App\Jobs\CrunchReports;
use App\Mail\IdeaSubmissionEmail;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class IdeaEventTest extends TestCase
{

    public function testExample()
    {
        $response = $this->get('/');
//        assertViewIs
        $this->assertTrue(true);
    }

// Bus Fake
    public function testCrunchReportJob()
    {
        Bus::fake();

        $user = User::findOrFail(1);

        dispatch(new CrunchReports($user));

        Bus::assertDispatched(CrunchReports::class, static function ($job) use ($user) {
            return $job->user->id === $user->id;
        });

        // Assert a job was not dispatched...
//         Bus::assertNotDispatched(IdeaSubmitted::class);
    }


    // Event Fake
    public function testIdeaSubmittedEvent()
    {
        Event::fake();

        // Perform order shipping...
        $idea = Idea::findOrFail(1);
        $user = User::findOrFail(1);

        \event(new IdeaSubmitted($user, $idea));

        Event::assertDispatched(IdeaSubmitted::class, static function ($e) use ($idea) {
            return $e->idea->id === $idea->id;
        });

        // Assert an event was dispatched twice...
        Event::assertDispatched(IdeaSubmitted::class, 1);

        // Assert an event was not dispatched...
        Event::assertNotDispatched(IdeaApproved::class);
    }


    // Mail Fake


    public function testIdeaSubmissionEMail()
    {
        Mail::fake();

        // Perform order shipping...

        // Mail::assertSent();
        // Mail::assertNotQueued();

        $idea = Idea::findOrFail(1);
        $user = User::findOrFail(1);

        Mail::to($user->email)->send(new IdeaSubmissionEmail($user, $idea));

        Mail::assertQueued(IdeaSubmissionEmail::class, static function ($mail) use ($idea) {
            return $mail->idea->id === $idea->id;
        });

        Mail::assertQueued(IdeaSubmissionEmail::class, static function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });

        // Assert a mailable was sent twice...
        Mail::assertQueued(IdeaSubmissionEmail::class, 1);

        // Assert a mailable was not sent...
//         Mail::assertNotSent(AnotherMailable::class);
    }


    public function testDocumentUpload()
    {
        Storage::fake('documents');

        $fileName = 'some-cool-document.pdf';

        $sizeInKilobytes = 1256;

        $file =UploadedFile::fake()->create($fileName, $sizeInKilobytes);

        $fileName = date('u') . '-' . $file->getClientOriginalName();

        $response = $this->post('/documents', [
            'document' => $file
        ]);

        // Assert the file was stored...
//        Storage::disk('documents')->assertExists('public/documents/'.$fileName);

        // Assert a file does not exist...
        Storage::disk('documents')->assertMissing('missing.pdf');
    }

}
