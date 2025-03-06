<?php

namespace App\Http\Controllers\Admin\FAQ;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Services\FQA\FQAService;
use Illuminate\Http\Request;

use function PHPSTORM_META\map;

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
        //
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
        return redirect()->route('faq.index')->with('success', 'FAQ added successfully!');
    }
    public function delete($id)
    {
        if ($this->faqService->destroy($id)) {
            return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully!');
        }

        return redirect()->route('faq.index')->with('error', 'Failed to delete FAQ.');
    }

}
