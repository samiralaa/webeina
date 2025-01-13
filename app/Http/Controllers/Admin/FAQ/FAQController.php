<?php

namespace App\Http\Controllers\Admin\FAQ;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Services\FQA\FQAService;
use Illuminate\Http\Request;

class FAQController extends Controller
{

    protected $faqService;
    public function __construct(FQAService $faqService)
    {
        $this->faqService = $faqService;
    }
    public function index()
    {
        $faqs = $this->faqService->getAllFAQ();

        // Iterate through the collection to decode the `question` and `answer` for each FAQ
        $faqs = $faqs->map(function ($faq) {
            return [
                'question' => json_decode($faq->question),
                'answer' => json_decode($faq->answer),
                'id' => $faq->id,
            ];
        });

        return view('admin.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.faq.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'question.en' => 'required|string|max:255',
            'answer.en' => 'required|string',
            'question.ar' => 'required|string|max:255',
            'answer.ar' => 'required|string',
        ]);

        // Prepare the data
        $data = [
            'question' => json_encode($request->input('question')),
            'answer' => json_encode($request->input('answer')),
        ];

        // Store the data using the service
        $faq = $this->faqService->create($data);

        // Redirect to the FAQ index page with a success message
        return redirect()->route('fqa.index')->with('success', 'FAQ added successfully!');
    }
}
