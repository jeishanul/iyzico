<?php

namespace App\Http\Controllers;

use App\Models\IyzicoSubcriptionProduct;
use Illuminate\Http\Request;
use Iyzipay\Model\Subscription\SubscriptionProduct;
use Iyzipay\Options;
use Iyzipay\Request\Subscription\SubscriptionCreateProductRequest;
use Illuminate\Support\Str;
use Iyzipay\Model\Card;
use Iyzipay\Model\CardInformation;
use Iyzipay\Model\Subscription\RetrieveList;
use Iyzipay\Model\Subscription\SubscriptionCreate;
use Iyzipay\Model\Subscription\SubscriptionPricingPlan;
use Iyzipay\Request\CreateCardRequest;
use Iyzipay\Request\Subscription\SubscriptionCreatePricingPlanRequest;
use Iyzipay\Request\Subscription\SubscriptionCreateRequest;
use Iyzipay\Request\Subscription\SubscriptionListCustomersRequest;
use Iyzipay\Request\Subscription\SubscriptionListPricingPlanRequest;
use Iyzipay\Request\Subscription\SubscriptionListProductsRequest;
use Iyzipay\Model\Locale;

class IyzicoController extends Controller
{
    public function product_list()
    {
        $options = $this->options();

        $request = new SubscriptionListProductsRequest();
        $request->setPage(1);
        $request->setCount(10);
        $result = RetrieveList::products($request, $options);

        return json_decode($result->getRawResult())->data;
    }
    public function product_create()
    {
        $options = $this->options();
        $request = new SubscriptionCreateProductRequest();
        $request->setLocale("tr");
        $request->setConversationId(Str::random(9));
        $request->setName("KingOfProductTest" . Str::random(5));
        $request->setDescription("DescriptionOfProductTest1" . Str::random(5));

        $result = SubscriptionProduct::create($request, $options);
        $product = json_decode($result->getRawResult())->data;

        IyzicoSubcriptionProduct::create([
            'name' => $product->name,
            'referenceCode' => $product->referenceCode,
            'createdDate' => $product->createdDate,
            'description' => $product->description,
            'status' => $product->status,
            'pricingPlans' => json_encode($product->pricingPlans)
        ]);

        return 'Iyzico product created successfully';
    }

    public function product_pricing()
    {
        $options = $this->options();

        $request = new SubscriptionCreatePricingPlanRequest();
        $request->setLocale('tr');
        $request->setConversationId(Str::random(9));
        $request->setProductReferenceCode('35e0b594-a268-4a76-85a4-1095bd73506a');
        $request->setName('testPlan');
        $request->setPrice('30.0');
        $request->setCurrencyCode('TRY');
        $request->setPaymentInterval('WEEKLY');
        $request->setPaymentIntervalCount(1);
        $request->setPlanPaymentType('RECURRING');
        $result = SubscriptionPricingPlan::create($request, $options);
        return 'Iyzico product pricing created successfully';
    }

    public function product_pricing_list()
    {
        $options = $this->options();
        $request = new SubscriptionListPricingPlanRequest();
        $request->setPage(1);
        $request->setCount(3);
        $request->setProductReferenceCode("35e0b594-a268-4a76-85a4-1095bd73506a");
        $result = RetrieveList::pricingPlan($request, $options);
        return response()->json(json_decode($result->getRawResult())->data);
    }

    public function customer_create()
    {
        $options = $this->options();

        $request = new \Iyzipay\Request\Subscription\SubscriptionCreateCustomerRequest();
        $request->setLocale("tr");
        $request->setConversationId(Str::random(9));

        $customer = new \Iyzipay\Model\Customer();
        $customer->setName("Hasancan");
        $customer->setSurname("Dogan");
        $customer->setGsmNumber("+905555555555");
        $customer->setEmail("hasancandogan@gmail.com");
        $customer->setIdentityNumber("15935784596");
        $customer->setShippingContactName("Hasancan Dogan");
        $customer->setShippingCity("Istanbul");
        $customer->setShippingDistrict("altunizade");
        $customer->setShippingCountry("Turkey");
        $customer->setShippingAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
        $customer->setShippingZipCode("34660");
        $customer->setBillingContactName("John Doe");
        $customer->setBillingCity("Istanbul");
        $customer->setBillingDistrict("altunizade");
        $customer->setBillingCountry("Turkey");
        $customer->setBillingAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
        $customer->setBillingZipCode("34660");

        $request->setCustomer($customer);
        $result = \Iyzipay\Model\Subscription\SubscriptionCustomer::create($request, $options);

        dd($result);
    }

    public function customer_list()
    {
        $options = $this->options();

        $request = new SubscriptionListCustomersRequest();
        $request->setPage(1);
        $request->setCount(100);
        $result = RetrieveList::customers($request, $options);

        return json_decode($result->getRawResult())->data;
    }

    public function card_add()
    {
        $options = $this->options();
        // $request = new \Iyzipay\Request\Subscription\SubscriptionCreateWithCustomerRequest();
        // $request->setConversationId("123456789");
        // $request->setLocale("tr");
        // $request->setPricingPlanReferenceCode("5ff6f7e0-5e19-49a5-8f31-f73a6de77ca7");
        // $request->setSubscriptionInitialStatus("ACTIVE");
        // $request->setCustomerReferenceCode("f38f3f50-36f5-49c8-a5b4-1674d65ea5d1");
        // $result = \Iyzipay\Model\Subscription\SubscriptionCreateWithCustomer::create($request, $options);
        // dd(json_decode($result->getRawResult())->data);

        $request = new \Iyzipay\Request\Subscription\SubscriptionCreateCheckoutFormRequest();
        $request->setConversationId("123456789");
        $request->setLocale("tr");
        $request->setPricingPlanReferenceCode("5ff6f7e0-5e19-49a5-8f31-f73a6de77ca7");
        $request->setSubscriptionInitialStatus("ACTIVE");
        $request->setCallbackUrl(route('subcription.callback'));

        $customer = new \Iyzipay\Model\Customer();
        $customer->setName("John");
        $customer->setSurname("Doe");
        $customer->setGsmNumber("+905555555555");
        $customer->setEmail("johndoe@iyzico.com");
        $customer->setIdentityNumber("11111111111");
        $customer->setShippingContactName("John Doe");
        $customer->setShippingCity("Istanbul");
        $customer->setShippingCountry("Turkey");
        $customer->setShippingAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
        $customer->setShippingZipCode("34660");
        $customer->setBillingContactName("John Doe");
        $customer->setBillingCity("Istanbul");
        $customer->setBillingCountry("Turkey");
        $customer->setBillingAddress("Uskudar Burhaniye Mahallesi iyzico A.S");
        $customer->setBillingZipCode("34660");
        $request->setCustomer($customer);
        $result = \Iyzipay\Model\Subscription\SubscriptionCreateCheckoutForm::create($request, $options);
        dd(json_decode($result->getRawResult()));
    }

    public function callback(Request $request)
    {
        dd($request->all());
    }

    private function options()
    {
        $options = new Options();
        $options->setApiKey(env('IYZIPAY_API_KEY'));
        $options->setSecretKey(env('IYZIPAY_SECRET_KEY'));
        $options->setBaseUrl(env('IYZIPAY_BASE_URL'));
        return $options;
    }
}
