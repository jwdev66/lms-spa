<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\IdeaSubmitted;
use App\Mail\IdeaSubmissionEmail;

class IdeaEventTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

// Bus Fake
    public function testCrunchReportJob()
    {
        Bus::fake();

        // Perform order shipping...

        Bus::assertDispatched(CrunchReports::class, function ($job) use ($idea) {
            return $job->idea->id === $idea->id;
        });

        // Assert a job was not dispatched...
        // Bus::assertNotDispatched(AnotherJob::class);
    }



    // Event Fake
    public function testIdeaSubmittedEvent()
    {
        Event::fake();

        // Perform order shipping...

        Event::assertDispatched(IdeaSubmitted::class, function ($e) use ($idea) {
            return $e->idea->id === $idea->id;
        });

        // Assert an event was dispatched twice...
        Event::assertDispatched(IdeaSubmitted::class, 2);

        // Assert an event was not dispatched...
        // Event::assertNotDispatched(OrderFailedToShip::class);
    }


    // Mail Fake


    public function testIdeaSubmissionEMail()
    {
        Mail::fake();

        // Perform order shipping...

        // Mail::assertQueued();
        // Mail::assertNotQueued();

        Mail::assertSent(IdeaSubmissionEmail::class, function ($mail) use ($idea) {
            return $mail->idea->id === $idea->id;
        });

        // Assert a message was sent to the given users...
        Mail::assertSent(IdeaSubmissionEmail::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email) ;
                    // && $mail->hasCc('...') &&
                //    $mail->hasBcc('...');
        });

        // Assert a mailable was sent twice...
        Mail::assertSent(OrderShipped::class, 1);

        // Assert a mailable was not sent...
        // Mail::assertNotSent(AnotherMailable::class);
    }


    public function testOrderShipping()
    {
        Queue::fake();

        // Perform order shipping...

        Queue::assertPushed(ShipOrder::class, function ($job) use ($order) {
            return $job->order->id === $order->id;
        });

        // Assert a job was pushed to a given queue...
        Queue::assertPushedOn('queue-name', ShipOrder::class);

        // Assert a job was pushed twice...
        Queue::assertPushed(ShipOrder::class, 2);

        // Assert a job was not pushed...
        Queue::assertNotPushed(AnotherJob::class);
    }


    public function testDocumentUpload()
    {
        Storage::fake('documents');

        $fileName = 'some-cool-document.pdf';
        $sizeInKilobytes = 1256;

        $response = $this->json('POST', '/documents', [
            'document' => UploadedFile::fake()->create($fileName, $sizeInKilobytes)
        ]);

        // Assert the file was stored...
        Storage::disk('documents')->assertExists($fileName);

        // Assert a file does not exist...
        Storage::disk('documents')->assertMissing('missing.pdf');
    }



}