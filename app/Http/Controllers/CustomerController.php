<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\Customer;
use App\Models\R_F_Q_Customer_address;
use App\Models\Country;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = Country::all();
        return Inertia::render('Masters/Customer/Create',['countries'=>$countries]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //     $validated = $request->validate([
        //     'company_name' => 'required|string|max:255',
        //     'vat_tax_id' => 'required|string|max:50',
        //     'customer_source' => 'nullable|string',
        //     'website' => 'nullable|url',
        //     'customer_code'=>'nullable',
        //     'customer_type' => 'nullable|string',
        //     'industry_type' => 'nullable|string',
        //     'customer_category' => 'nullable|string',
        //     'customer_industry' => 'nullable|string',
        //     'logo' => 'nullable|image|max:2048',
        //    'document_type' => 'nullable|string',
        //     'company_documents.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:5120',

        //     // Example nested array validation
        //     'addresses' => 'required|array|min:1',
        //     'addresses.*.address' => 'required|string|max:255',
        //     // Add more address fields here...

        //     'bank_accounts' => 'required|array|min:1',
        //     'bank_accounts.*.account_holder_name' => 'required|string|max:255',
        //     'bank_accounts.*.country_id' => 'required|string',
        //     'bank_accounts.*.currency' => 'required|string',
        //     'bank_accounts.*.bank_name' => 'required|string|max:255',
        //     'bank_accounts.*.iban_account_number' => 'required|string|max:255',
        //     'bank_accounts.*.documents.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp|max:5120',

        //     'contact_persons' => 'required|array|min:1',
        //     'contact_persons.*.full_name' => 'required|string|max:255',
        //     'contact_persons.*.email' => 'nullable|email',
        //     // Add more person fields...
        // ]);
            $customer = new Customer();
            $customer->name = $request->company_name;
            $customer->VAT= $request->vat_tax_id;
            $customer->customer_source = $request->customer_source;
            $customer->customer_code = $request->customer_code;
            $customer->website = $request->website;
            $customer->customer_type = $request->customer_type;
            $customer->industry_type = $request->industry_type;
            $customer->customer_category = $request->customer_category;
            $customer->customer_industry = $request->customer_industry;
            $customer->document_type = $request->document_type;

            // ✅ Save Logo (if exists)
            if ($request->hasFile('logo')) {
                $logoPath = $request->file('logo')->store('logos', 'public');
                $customer->customer_logo = $logoPath;

            }

            // ✅ Save Company Documents as JSON
            $uploadedDocs = [];
            if ($request->hasFile('company_documents')) {
                foreach ($request->file('company_documents') as $file) {
                    $uploadedDocs[] = $file->store('documents', 'public');
                }
                $customer->documents = json_encode($uploadedDocs);
            }

            $customer->save();
            // ✅ Store addresses
        foreach ($request->addresses as $address) {
            DB::table('r__f__q__customer_addresses')->insert([
                'customer_id' => $customer->id,
                'address' => $address['address'] ?? null,
                'StreetAddress' => $address['street_address'] ?? null,
                'is_shipping' => isset($address['is_shipping']) ? (bool) $address['is_shipping'] : false,
                'country_id' => $address['country_id'] ?? null,
                'postal_code' => $address['zip_code'] ?? null,
                'is_billing' => isset($address['is_billing']) ? (bool) $address['is_billing'] : false,
                'state' => $address['state'] ?? null,
                'phone' => $address['phone'] ?? null,
                'is_primary' => isset($address['is_primary']) ? (bool) $address['is_primary'] : false,
                'city' => $address['city'] ?? null,
                'email' => $address['email'] ?? null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        // Add bank account details
        DB::transaction(function () use ($request, $customer) {
        foreach ($request->bank_accounts as $index => $bank) {
            // ✅ Insert bank account
            $bankAccountId = DB::table('r__f__q__customer__bank__accounts')->insertGetId([
                'customer_id' => $customer->id,
                'account_holder_name' => $bank['account_holder_name'] ?? null,
                'country_id' => $bank['country_id'] ?? null,
                'currency' => $bank['currency'] ?? null,
                'bank_name' => $bank['bank_name'] ?? null,
                'iban_account_number' => $bank['iban_account_number'] ?? null,
                'remarks' => $bank['remarks'] ?? null,
                'branch_name' => $bank['branch_name'] ?? null,
                'swift_code' => $bank['swift_bic'] ?? null,
                'is_primary' => isset($bank['is_primary']) ? (bool) $bank['is_primary'] : false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // ✅ Upload documents linked to this bank account
            if ($request->hasFile("bank_accounts.$index.documents")) {
                foreach ($request->file("bank_accounts.$index.documents") as $file) {
                    $filePath = $file->store('bank_documents', 'public');

                    DB::table('customer_bank_accounts')->insert([
                        'bank_id' => $bankAccountId,
                        'bank_documents' => $filePath,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    });

    //add contact person
    // 👇 Save contact persons
    foreach ($request->contact_persons as $contact) {
        DB::table('r__f__q__customer_ponit_of_contacts')->insert([
            'customer_id' => $customer->id,
            'full_name' => $contact['full_name'] ?? null,
            'department' => $contact['department'] ?? null,
            'country_id' => $contact['country_id'] ?? null,
            'designation' => $contact['designation'] ?? null,
            'email' => $contact['email'] ?? null,
            'phone' => $contact['phone'] ?? null,
            'is_primary' => isset($contact['is_primary']) ? (bool)$contact['is_primary'] : false,
            'alternate_phone'=>$contact['alternate_phone'] ?? null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    return response()->json(['message' => 'Customer and contacts saved successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
