<script type="text/javascript">
    if (typeof iyziInit == 'undefined') {
        var iyziInit = {
            currency: "TRY",
            token: "04df8a05-b8ad-4058-a04e-a04c943d331d",
            price: 100.00,
            pwiPrice: 100.00,
            locale: "tr",
            baseUrl: "https://sandbox-api.iyzipay.com",
            merchantGatewayBaseUrl: "https://sandbox-merchantgw.iyzipay.com",
            registerCardEnabled: false,
            bkmEnabled: false,
            bankTransferEnabled: false,
            bankTransferTimeLimit: {
                "value": 5,
                "type": "day"
            },
            bankTransferRedirectUrl: "",
            bankTransferCustomUIProps: {},
            campaignEnabled: false,
            campaignMarketingUiDisplay: null,
            paymentSourceName: "",
            plusInstallmentResponseList: null,
            payWithIyzicoSingleTab: false,
            payWithIyzicoSingleTabV2: false,
            payWithIyzicoOneTab: false,
            newDesignEnabled: false,
            mixPaymentEnabled: true,
            creditCardEnabled: true,
            bankTransferAccounts: [],
            userCards: [],
            fundEnabled: false,
            memberCheckoutOtpData: {},
            force3Ds: false,
            isSandbox: true,
            storeNewCardEnabled: true,
            paymentWithNewCardEnabled: true,
            enabledApmTypes: [],
            payWithIyzicoUsed: false,
            payWithIyzicoEnabled: false,
            payWithIyzicoCustomUI: {},
            buyerName: "John",
            buyerSurname: "Doe",
            merchantInfo: "",
            merchantName: "Sandbox Merchant Name - 3397622",
            cancelUrl: "",
            buyerProtectionEnabled: false,
            hide3DS: true,
            gsmNumber: "+905555555555",
            email: "johndoe@iyzico.com",
            checkConsumerDetail: {},
            subscriptionPaymentEnabled: true,
            ucsEnabled: true,
            fingerprintEnabled: false,
            payWithIyzicoFirstTab: false,
            creditEnabled: false,
            payWithIyzicoLead: false,
            goBackUrl: "",
            metadata: {
                "debitCardAllowed": "false"
            },
            createTag: function() {
                var iyziJSTag = document.createElement('script');
                iyziJSTag.setAttribute('src',
                    'https://sandbox-static.iyzipay.com/checkoutform/v2/bundle.js?v=1719482202733');
                document.head.appendChild(iyziJSTag);
            }
        };
        iyziInit.createTag();
    }
</script>
<script type="text/javascript">
    if (typeof iyziUcsInit == 'undefined') {
        var iyziUcsInit = {
            "baseUrl": "https://sandbox-api.iyzipay.com",
            "buyerProtectedConsumer": false,
            "ucsToken": "6c5db59a-6f1e-42b7-8434-02cd9131e54c",
            "scriptType": "CONSUMER_WITH_CARD_EXIST",
            "buyerProtectedMerchant": false,
            "maskedGsmNumber": "+90********55",
            "ucsConsentRequiredConsumer": false,
            "gsmNumber": "+905555555555",
            "merchantName": "Sandbox Merchant Name - 3397622",
            createTag: function() {
                var iyziUcsJSTag = document.createElement('script');
                iyziUcsJSTag.setAttribute('src',
                    'https://sandbox-static.iyzipay.com/checkoutform/v2/bundle.js?v=1719482202764');
                document.head.appendChild(iyziUcsJSTag);
            }
        };
        if (typeof iyziInit == 'undefined') {
            iyziUcsInit.createTag();
        }
    }
</script>
<script type="text/javascript">
    if (typeof iyziSubscriptionInit == 'undefined') {
        var iyziSubscriptionInit = {
            "daysOfTrialPeriod": "0",
            "intervalCount": "1",
            "subscriptionState": "START_WITH_PAY",
            "interval": "MONTHLY",
            "pricingPlanPrice": "100.00"
        }
    }
</script>
