const API = 'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2ljSEp2Wm1sc1pWOXdheUk2T1RVM01UZzJMQ0p1WVcxbElqb2lhVzVwZEdsaGJDSjkuNmg0cER5Z2Fja0ZPZWgtQm9TRUd6TXhkWGVjZVgyNXhHYXVBOGo2YUZPZHBqbFJsRVU4M3ItRHdIMGR2MF9NX1g0V0JZY0dPUi12akRQOTBndGJ0blE=='
const integrationID = 4454774;

async function firstStep() {
     let data = {
          "api_key": API
     }

     let request = await fetch('https://accept.paymob.com/api/auth/tokens', {
          method: 'post',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(data)
     })

     let response = await request.json()

     let token = response.token

     secondStep(token)
}

async function secondStep(token) {
     let data = {
          "auth_token": token,
          "delivery_needed": "false",
          "amount_cents": "100",
          "currency": "EGP",
          "items": [],
     }

     let request = await fetch('https://accept.paymob.com/api/ecommerce/orders', {
          method: 'post',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(data)
     })

     let response = await request.json()

     let id = response.id

     thirdStep(token, id)
}

async function thirdStep(token, id) {
     let data = {
          "auth_token": token,
          "amount_cents": "100",
          "expiration": 3600,
          "order_id": id,
          "billing_data": {
               "apartment": "803",
               "email": "claudette09@exa.com",
               "floor": "42",
               "first_name": "Clifford",
               "street": "Ethan Land",
               "building": "8028",
               "phone_number": "+86(8)9135210487",
               "shipping_method": "PKG",
               "postal_code": "01898",
               "city": "Jaskolskiburgh",
               "country": "CR",
               "last_name": "Nicolas",
               "state": "Utah"
          },
          "currency": "EGP",
          "integration_id": integrationID
     }

     let request = await fetch('https://accept.paymob.com/api/acceptance/payment_keys', {
          method: 'post',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(data)
     })

     let response = await request.json()
     let TheToken = response.token

     cardPayment(TheToken)
}


async function cardPayment(token) {

     // let iframeURL = `https://accept.paymob.com/api/acceptance/iframes/836444?payment_token=${token}`
    //  let iframeURL = `https://accept.paymob.com/api/acceptance/iframes/821551?payment_token=${token}&id=1&org=2`
     // https://accept.paymob.com/api/acceptance/iframes/821551?payment_token={payment_key_obtained_previously}
     let iframeURL = `https://accept.paymob.com/api/acceptance/iframes/821551?payment_token=${token}`;

     location.href = iframeURL

}


