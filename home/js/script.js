// // const ROUTE_URL = "https://outside-expenses-wet-door.trycloudflare.com/";
// const ROUTE_URL = "https://cod-king-6a9766d9c49f.herokuapp.com/";
// const settingsMap = {
//   enable_pre_order_otp: "enablePreOrderOtp",
//   otp_wait_time: "otpWaitTimeInCodKSettings",
//   max_retries: "maxTriesInCodKSettings",
//   country_code_list: "countryCodeList",
//   pre_invalid_otp_msg: "wrongOtpText",
//   pre_verify_button_label: "verifyBtnText",
//   pre_heading: "heading",
//   pre_sub_heading: "subHeading",
//   pre_send_button_label: "sendBtnText",
//   pre_skip_btn_text: "skipBtnText",
//   pre_redirect_text: "redirectText",
//   pre_show_skip_btn: "showSkipBtn",
//   pre_primary_button_color: "prePrimaryButtonColor",
//   pre_secondary_button_color: "preSecondaryButtonColor",
//   pre_primary_button_font_color: "prePrimaryButtonFontColor",
//   pre_secondary_button_font_color: "preSecondaryButtonFontColor",
//   pre_whatsapp_button: "preWhatsappButton",
//   pre_whatsapp_button_text: "preWhatsappButtonText",
//   hide_shipping_method: "hideShippingMethod",
//   is_prefilled_address_enabled: "isPrefilledAddressEnabled",
//   pre_phone_placeholder: "phonePlaceholder",
//   pre_invalid_phone: "invalidPhoneText",
//   pre_verify_mobile: "verifyMobileText",
//   pre_enter_code: "enterCodeText",
//   pre_retry_in: "retryInText",
//   pre_resend: "resendText",
//   pre_failed_to_verify: "failedToVerifyText",
//   pre_verifying: "verifyingText",
//   pre_too_many: "tooManyAttemptsText",
//   pre_is_new_design_enabled: "isNewDesignEnabled",
//   pre_v2_title: "preV2Title",
//   store_front_token: "storeFrontToken",
//   pre_is_login_enabled: "preIsLoginEnabled",
//   pre_v2_theme: "preV2Theme",
//   pre_v2_show_order_summary: "preV2ShowOrderSummary",
//   partial_payment_enabled: "partialPaymentEnabled",
//   debug: "debug",
//   pre_email_mandatory: "preEmailMandatory",
//   pre_geo_countries: "preGeoCountries",
//   pre_show_branding: "preShowBranding",
// };

// (function () {
//   const SELECTORS = {
//     BUY_NOW: [
//       'button[name="buy"]',
//       "button.buy-now",
//       '.quick-buy button[name="buy"]',
//       ".quick-buy button.buy-now",
//       ".shopify-payment-button__button",
//       "div.wallet-button-fade-in button.shopify-payment-button__button",
//       "button[class*='shopify-payment-button__button']",
//       "button[class*='shopify-payment-button__button--unbranded']",
//       "button[class*='shopify-payment-button']",
//       "button[class*='shopify-buy-it-now-button']",
//       "button[class*='buy-it-now']",
//       "button[class*='shop-now-btn']",
//       "button[class*='buy-now-btn']",
//       "button[class*='pay-now-btn']",
//       // Add any other "Buy Now" specific selectors
//       ".buy-now",
//       "#buyNow",
//       ".aod_buy_button",
//       "a[class*='buy-now']",
//       ".ecom-product-single__buy_it_now_btn--checkout",
//       ".codk-buy-now",
//     ],
//     CART_DRAWER: [
//       ".cart-drawer-checkout",
//       ".cart-drawer-buy-now",
//       "#CartDrawer-Checkout",
//       "#mu-checkout-button",
//       ".button-checkout",
//       "#cart-sidebar-checkout",
//       ".cart--checkout__button",
//       ".cart__checkout",
//       ".amtCartDrawer__footer__btnCheckout amtCartDrawer__button",
//       ".rebuy-button",
//       ".codk-cart-drawer",
//       "#opus-checkout-btn",
//       ".opus-btn-checkout",
//       ".cd-checkout-section-button",
//       ".js-cart-btn-checkout",
//     ],
//     CART_CHECKOUT: [
//       "input[name='checkout']",
//       "button[name='checkout']",
//       "button[id='cart-checkout']",
//       "button[id='cart-sidebar-checkout']",
//       "button[class='mr-popup-offer-actions__checkout-button']",
//       "div[class~='shopify-payment-button']",
//       "a[class~='cart-checkout-button']",
//       "button[name='checkout2']",
//       "dropdown-site-header__cart",
//       "button[class='rebuy-button']",
//       ".codk-cart-checkout",
//       ".picky-cart__button",
//       ".xb_slide_cart_button_checkout",
//       ".t4s-btn__checkout",
//       ".bls-btn-checkout",
//       "#CartDrawer-Checkout",
//       ".wc-proceed-to-checkout",
//       ".kaktusc-cart__checkout",
//       ".easc-checkoutBtn",
//       ".cart__ctas",
//       "#corner-cowi-cart-summary-card-cta-button",
//       ".tpo-btn-checkout",
//       "#mu-checkout-button",
//       "#monster-upsell-cart",
//     ],
//     // Additional button types can be added here, e.g.,:
//     // ADD_TO_CART: [ ... ],
//   };

//   // avoid duplicate loading
//   if (window.COD_OTP_BOX_LOADED) {
//     return;
//   } else {
//     window.COD_OTP_BOX_LOADED = true;
//   }

//   const DEBUG_MODE = false;
//   const debugLog = (...args) => {
//     if (DEBUG_MODE == "true") {
//       console.log(...args);
//     }
//   };

//   // Define the handleBlockButtonClick function
//   const handleBlockButtonClick = (e) => {
//     debugLog("Checkout button blocked by extension");
//     e.preventDefault();
//     e.stopPropagation();
//   };
//   window.codkblockListener = handleBlockButtonClick;

//   // Function to observe buttons and attach event listeners when enabled
//   const observeButtons = () => {
//     Object.keys(SELECTORS).forEach((key) => {
//       const selectors = SELECTORS[key];
//       selectors.forEach((selector) => {
//         document.querySelectorAll(selector).forEach((button) => {
//           if (!button.disabled) {
//             button.addEventListener("click", window.codkblockListener, true);
//           } else {
//             // Observe when the button becomes enabled
//             const observer = new MutationObserver((mutationsList, observer) => {
//               mutationsList.forEach((mutation) => {
//                 if (mutation.attributeName === "disabled" && !button.disabled) {
//                   button.addEventListener(
//                     "click",
//                     window.codkblockListener,
//                     true
//                   );
//                   observer.disconnect(); // Stop observing once the listener is added
//                 }
//               });
//             });
//             observer.observe(button, { attributes: true });
//           }
//         });
//       });
//     });
//   };

//   const disableNormalCheckout = () => {
//     debugLog("Disabling normal checkout buttons from extension...");
//     observeButtons(); // Observe buttons and handle blocking
//   };

//   const enableNormalCheckout = () => {
//     Object.keys(SELECTORS).forEach((key) => {
//       const selectors = SELECTORS[key];
//       selectors.forEach((selector) => {
//         document.querySelectorAll(selector).forEach((button) => {
//           button?.removeEventListener("click", window.codkblockListener, true);
//           button?.removeEventListener(
//             "click",
//             typeof window.popupEventListener === "function"
//               ? window.popupEventListener
//               : null,
//             true
//           );
//           button?.removeAttribute("data-event-listener-attached");
//         });
//       });
//     });
//   };

//   function hidePartialPaymentProducts() {
//     const productItems = document.querySelectorAll(".grid-view-item");

//     productItems.forEach((item) => {
//       const productTitle = item.querySelector(".grid-view-item__title");

//       if (
//         productTitle &&
//         productTitle.textContent.trim().startsWith("Partial Payment")
//       ) {
//         item.style.display = "none"; // Hide the product
//       }
//     });

//     document.querySelectorAll(".product-item").forEach(function (item) {
//       const productData = item.getAttribute("data-json-product");
//       if (productData && productData.includes("Partial Payment")) {
//         item.style.display = "none";
//       }
//     });
//   }

//   const callPartialRuleSets = async () => {
//     try {
//       const shopifyDomain = window.Shopify.shop;
//       const response = await fetch(
//         `${ROUTE_URL}order_confirmations/partial_rule_sets?shopifyDomain=${shopifyDomain}`,
//         {
//           method: "GET",
//           headers: {
//             "Content-Type": "application/json",
//           },
//         }
//       );

//       if (response.ok) {
//         // Check if the response status is in the range 200-299
//         const data = await response.json(); // Parse the JSON from the response
//         // debugLog("Partial Rule Sets fetched successfully:", data?.rule_sets);
//         // sessionStorage.setItem("ruleSets", JSON.stringify(data?.rule_sets));
//         // await generatePartialPaymentWrappedCode();
//         const filteredRuleSets =
//           data?.rule_sets?.filter((rule) => rule.is_cart_rule === true) || [];

//         debugLog("Filtered Partial Rule Sets:", filteredRuleSets);

//         // Store only the filtered rules in sessionStorage
//         sessionStorage.setItem("ruleSets", JSON.stringify(filteredRuleSets));

//         return data; // Return the response for further use
//       } else {
//         console.error(
//           "Failed to fetch Partial Rule Sets:",
//           response.statusText
//         );
//         throw new Error("Error fetching Partial Rule Sets.");
//       }
//     } catch (error) {
//       console.error("Error fetching Partial Rule Sets:", error);
//       throw error; // Propagate the error for the calling code to handle
//     }
//   };

//   const fetchSettings = async () => {
//     try {
//       debugLog("inside fetchSettings");
//       const response = await fetch(
//         `${ROUTE_URL}script/settings?domain=${window.Shopify.shop}`
//       );
//       debugLog("response from extension", response);

//       if (!response.ok) {
//         throw new Error(`HTTP error! status: ${response.status}`);
//       }
//       const newSettings = await response.json();
//       debugLog("fetchSettings", newSettings);

//       return newSettings;
//     } catch (error) {
//       console.error("Error fetching settings:", error);
//       enableNormalCheckout();
//       return null;
//     }
//   };

//   function loadScript() {
//     debugLog("Loading script from extension...");

//     const script = document.createElement("script");
//     // script.src =
//     //   "https://cdn.shopify.com/s/files/1/0743/3119/3628/files/script_6d18b458-38fb-42db-8044-d84ab8c89b1b.js?v=1733823412";

//     //script.src = "https://codkingscript.s3.us-west-2.amazonaws.com/script.js";
//     // script.src =
//     //   "https://domains-arthur-plans-sunset.trycloudflare.com/script.js";

//     // script.src = "https://cod-king-6a9766d9c49f.herokuapp.com/script.js";
//     script.src = `${ROUTE_URL}script.js`;

//     https: script.async = false;
//     const head = document.getElementsByTagName("head")[0];
//     head.insertBefore(script, head.lastChild);
//   }

//   function getVerifiedNumberFromSessionStorage(key) {
//     try {
//       //key = verifiedNumberData
//       // Retrieve the JSON string from sessionStorage
//       const jsonString = sessionStorage.getItem(key);
//       // If the key does not exist, return null
//       if (!jsonString) {
//         return null;
//       }
//       // Parse the JSON string back into an object
//       return JSON.parse(jsonString);
//     } catch (error) {
//       console.error(
//         "Error retrieving verified number from sessionStorage:",
//         error
//       );
//       return null;
//     }
//   }
//   const mapSettings = (responseData) => {
//     const mapped = {};
//     Object.entries(settingsMap).forEach(([apiKey, stateKey]) => {
//       mapped[stateKey] = responseData[apiKey];
//     });
//     return mapped;
//   };

//   const observePreOrderOTPEnabled = () => {
//     try {
//       // Step 1: Start by disabling checkout
//       disableNormalCheckout();
//       const sessionStorageData = JSON.parse(
//         sessionStorage.getItem("settingSession")
//       );
//       const isLoginFLowEnabled = sessionStorageData?.preIsLoginEnabled || false;
//       const isPreOrderOtpEnabled =
//         sessionStorageData?.enablePreOrderOtp || false;
//       const isPartialPaymentEnabled =
//         sessionStorageData?.partialPaymentEnabled || false;

//       // Step 2: Login flow has highest priority
//       if (isLoginFLowEnabled) {
//         debugLog("Login flow is enabled → enabling normal checkout.");
//         enableNormalCheckout();

//         return;
//       }

//       // Step 3: If both Pre-order OTP and Partial Payment are disabled
//       if (!isPreOrderOtpEnabled && !isPartialPaymentEnabled) {
//         debugLog(
//           "Both Pre-order OTP and Partial Payment are disabled → enabling normal checkout."
//         );
//         enableNormalCheckout();

//         return;
//       }

//       // Step 4: Else, keep checkout disabled (already handled in Step 1)
//       debugLog(
//         "Either Pre-order OTP or Partial Payment is enabled → keeping checkout disabled."
//       );
//     } catch (error) {
//       console.error("Error checking pre-order OTP status:", error);
//       enableNormalCheckout(); // fallback
//     }
//   };

//   const fetchMachineDetails = async () => {
//     try {
//       const response = await fetch("https://ipapi.co/json/");
//       return response.json();
//     } catch (error) {
//       console.error("Error fetching machine details:", error);
//       return null;
//     }
//   };

//   const checkDefaultCountry = async () => {
//     const settingsStr = sessionStorage.getItem("settingSession");
//     if (!settingsStr) return false;

//     let settings;
//     try {
//       settings = JSON.parse(settingsStr);
//     } catch (e) {
//       console.error("Failed to parse settingSession:", e);
//       return false;
//     }

//     const geoCountriesRaw = settings?.preGeoCountries;
//     const geoCountries = (geoCountriesRaw || "")
//       .split(",")
//       .map((c) => c.trim().toLowerCase())
//       .filter(Boolean);

//     // If geoCountries is empty/null/undefined → no restriction → return true
//     if (!geoCountriesRaw || geoCountriesRaw.trim() === "") {
//       return true;
//     }

//     let defaultCountry = localStorage.getItem("defaultCountry");
//     if (!defaultCountry) {
//       try {
//         const result = await fetchMachineDetails();
//         defaultCountry = (result?.country || "").toLowerCase();
//         localStorage.setItem("defaultCountry", JSON.stringify(defaultCountry));
//       } catch (err) {
//         console.error("Error fetching machine details", err);
//         return false;
//       }
//     } else {
//       defaultCountry = JSON.parse(defaultCountry);
//     }

//     return geoCountries.includes(defaultCountry);
//   };

//   const startOTPObserverIfEligible = async () => {
//     const shouldRunOTP = await checkDefaultCountry();
//     if (shouldRunOTP) {
//       debugLog("observePreOrderOTPEnabled running");
//       observePreOrderOTPEnabled();
//     } else {
//       debugLog("OTP observer skipped due to geo restrictions.");
//       enableNormalCheckout();
//     }
//   };

//   try {
//     console.log(
//       "%c████████████ COD King ████████████",
//       "font-weight: bold; font-size: 14px; background: red; color: white; padding: 4px 8px; border-radius: 4px;"
//     );
//     disableNormalCheckout();
//     setTimeout(async function () {
//       debugLog("before calling setting from extension");
//       let settings;
//       const settingsStr = sessionStorage.getItem("settingSession");

//       if (!settingsStr) {
//         const response = await fetchSettings();
//         if (response) {
//           const newSettings = mapSettings(response);
//           sessionStorage.setItem("settingSession", JSON.stringify(newSettings));
//           startOTPObserverIfEligible();
//           if (newSettings?.partialPaymentEnabled === true) {
//             callPartialRuleSets();
//           }
//           settings = newSettings;
//         } else {
//           debugLog("Failed to load settings from server.");
//           enableNormalCheckout();
//           return;
//         }
//       } else {
//         settings = JSON.parse(settingsStr);
//         startOTPObserverIfEligible();
//         if (settings?.partialPaymentEnabled === true) {
//           const ruleSets = JSON.parse(sessionStorage.getItem("ruleSets"));
//           if (!ruleSets) {
//             callPartialRuleSets();
//           }
//         }
//       }

//       if (settings?.partialPaymentEnabled === true) {
//         hidePartialPaymentProducts();
//       }

//       loadScript();
//     }, 10);
//   } catch (e) {
//     debugLog("Error Loading OTP Box, Please reach out to us via chat bubble");
//     enableNormalCheckout();
//   }
// })();
