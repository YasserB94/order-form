# Order Form
A BeCode learning challenge for PHP.
Trough this exercise I will learn how to use PHP to dynamicly update the website as a user enters information in a form.
No database implementation is required for this exercise.
## Goals
_This is a personal interpretation of the challenge creating a step by step plan to follow to achieve the requested result_
1. Create a concept for a store that can have a webshop  
    * [ ] Have a name
    * [ ] Have a set of products to sell
    * [ ] Have an alternative set of products to sell
2. Accept orders  
    * [ ] Have an order confirmation screen when the form is submitted
3. Valide the form - **!SERVER SIDE!**  
    * [ ] Required fields may not be empty
    * [ ] The adress is valid
    * [ ] The E-Mail adress is valid 
        * [ ] Invalid ? Show an alert!
            * [ ] Maintain the previously entered values in the form
        * [ ] Valid ? Show the confirmation box!
4. Improve the user experience with PHP Super globals  
    * [ ] Explore session and Cookies to improve the UX
        - For example: Prefill the adress as long as the browser isn't closed.
        - Keep the user's previous choices on the website as long as the user hasn't checked out.
## Stretch Goals
_This is my interpretation of the 'extra' challenges within the learning challenge_
1. Expand  
    * [ ] Create a toggle that switches the site to a different set of products.
2. Bulk Orders  
    * [ ] Allow the user to buy multiple instances of a product
3. Look & Feel  
    * [ ] Style the site using html/css
    * [ ] Improve the validation with html/js
## Progress
1. **The Concept**  
Due to the lack of inspiration let's take a random bar in Antwerp that also sells some food items.

2. **The Products**  
Productline 1 - Drinks:
    * Rose All Day Sangria - €7
        Homemade Sangria based on the rosé wine:'Petit Jamelles' and filled to the brim with fresh fruits!
    * The Splash - €5.5
        Creamy IPA with the aromatics of sweet melon, stonefruit and a hint of bubblegum
    * Juice Junkee - €4.6
        Creamy IPA with the aromatics of pineapple, mango and passionfruit
    * Dirty Talk - € 5.2
        Floral Misty IPA freshly hopped citrus aromatics, a true taste bomb
    * Limoncello Fizz - €8.5
        Signature cocktail with sparkling cava,sweet lemon and fresh mint
Productline 2 - Food:
    * Manchego - €6
        Spanish cheese and homemade chutney with crisps
    * Spagethi - €10.5
        Home made bolognaise or vegetarian spagetthi
    * Olive Dip - €5.5
        Roasted peppers,Sun dried tomatoes and olives with toast
    * Mixed Nuts - €1 (Free with the purchase of more than 2 drinks)
        A bowl out of our hand selected bulk bought nutmix
    * Cheesy Nachos - €5
        Delicious nachos with hot molten cheese

3. **Make the form work on submit!**  
Once more, **(w3Schools)[https://www.w3schools.com/php/php_forms.asp]** was the place to be here, I gave the submit button a name and it showed up in $_POST =D

4. **Validate the form**  
Currently the validate function only checks if any field is empty or not.
I used this function to see if everything worked as I expected(the way I can read data using the superglobals). Now that I know this works I think I want to use a function to get all of the data in my php script's scope out of the https area. But maintaining the keys.

5. **Setting up functions to handle Data**
Im not sure if this has added benefit, but it does make sense to me to actually have the Data outside of the superglobals. So before continueing on this learning challenge, I want to think about 2 main functions: One that extracts all the data in the POST superglobal when the form is submitted, and another that filters that data so I have an array that only holds the form related data. 
One of many benefits of this is that I can work with the data without changing the actual values inside the $_POST superglobal, altough I'll have to figure out how to write this and keep the key's aswell!

## TOFIX

## Summary