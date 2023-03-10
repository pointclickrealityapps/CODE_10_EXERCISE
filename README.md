# Code 10 - Coding Exercise - StarWars API

#### Build a server that queries the Star Wars API for information on how to beat the Galactic Empire.

![Introduction Image](./public/assets/media/docs/intro.gif)

#### Laravel + Livewire + StarWars API = Full Stack PHP App (- Database)

## Motivation

To demonstrate the range of my knowledge when it comes to writing API specifications, but I also wanted to
show my skills as a Full-Stack Developer. I hope this is proof of my skills when it comes to building a server that
communicates with the with Star Wars API.

#### What's so cool about this project?

This app provides a one-stop shop when it comes to testing our api, we also have the added benefit of interacting
with our api as if it were a real app consuming our api calls.
This means we never have to leave the app for anything, we can test via docs portal, or we can use the livewire
component
to show us what the payloads would actually perform in a working app.
The livewire component will take care of all the heavy lifting such as formatting the payload.
Not only does this project answer the requests of the challenge,
it also provides a few more additions such as rendering some views in Wookiee format, performing actual search queries,
working pagination, & more.

### Tools & Features

- PHP 8
- Laravel 8 - Core Framework
- Laravel Livewire 2.0 - To render FrontEnd UI components
- Laravel Resources - Used to format the incoming payload into a JSONResponse that includes any of the additional data
  required to complete any of the exercise tasks.
- Traits/Helpers - Used to format the Url or used to assist with structuring the APIResponses.
- iDoc - Api Documentation Portal that allows us to perform CRUD operations against our internal api directly from the
  docs without needing to use Postman or Insomnia to perform api calls.
- Boostrap 3 - UI Kit for designing the application theme
- Random Images - The images generated in this application are randomly set each time the api endpoints are called. They
  offer some space adventure eye candy, but they are not official Star Wars images, just placeholders to be used by the
  Front-end UI.

## Getting Started

This app only needs to communicate with Star Wars Api internally, so there are no database requirements. You only need
to download this project, run a few artisan commands, & you are able to hit the ground running as soon as the landing
page loads. Pretty simple right?
Lets get started.

### Command Line

>From the root of your project you will need to use the terminal. There are only two steps required before you can get
>started using app.
>Please follow steps below

### Install Composer Packages - Step 1

Once you have the app installed, please open your terminal or your preferred Command Line Interface & enter the
following command in project root.

```angular2html
composer install
```

### Add .env file - Step 2

> Although we do are not creating a db connection, we need our `.env` file in order to run our lravel app. We only need
> to run the below command in order to do this

```angular2html
cp .env.example .env
```

### Add Application Key - Step 3

You need to generate a key for your application. Lets generate your key by running the command below

```angular2html
php artisan key:generate
```

##### Now that we have added our application key, we can now get started interacting with our API. Lets get started!!

### Time To Start Working With The Star Wars Api!

>Now that we have our `.env` file added, we are done with `command line` let's dive right into this project!

## Visit API Specification Docs

We can use the API docs to view the details of how we interact with our api responses. We can also perform HTTP calls
using BASH, Javascript, or PHP in real time directly from our docs portal.
![docs](./public/assets/media/docs/docs.gif)
> Access Api Docs Portal  **[API Specification Docs Portal](/docs)** at anytime from your app by
> visiting `http://yourwebsitedomain.com/docs`

## Visit Home Page

Alternatively you can visit the root index page of your app, where you will find all the answers to the challege
requirements at the very top.

> Interact with api responses using livewire component. Home Page : http://yourwebsitedomain.com

### How-To Guide

This application not only has a place for us to access Api docs, but we can also interact with our api via a front-end
livewire component, or perform HTTP calls against our api without having to use an external program such as Postman.
Please see section below to learn how to use certain features, or check out our docs portal to see api specs.

### Coding Exercise Requirements Answers

The top section of this application includes links to all of the required execise requirements.
If you are not interested in using the livewire component to perform api calls. You can use those buttons to quickly
access the pages related to the requirements for completing this assignment.

![challenge](./public/assets/media/docs/challenge.gif)

### Livewire to perform HTTP Calls

Although not required, livewire was included to allow us to see what our api would look like in a real app.
The responses being returned to the livewire component are 100% the same as the actual raw JSON output, this was just a
fun way to display the same results.
> If you would like to leverage the handy livewire component provided in our app.
> The steps below will explain the functionality of how this component works.

#### Search Person by name

We can enter a value in the search field that will be passed as a query params to our api that will return persons that
match our search term.
![Search](./public/assets/media/docs/search.gif)

#### Person Table Actions

Actions allow us to quickly access details about a person. This can be to show the profile, view api response directly,
or view api response in Wookiee format
![action](./public/assets/media/docs/actions.gif)

#### Person Table Pagination Links

Whenever we view any collection of data in our livewire component we are returned a paginated collection of items.
We can easily move from page to page by clicking `Previous Page` or `Next Page` buttons on the top right corner of our
table.

![Pagination](./public/assets/media/docs/pagination.gif)

> HTTP calls will update our view automatically in real-time as the api responds

#### Person Profile

The person profile returns all details of the person returned from api.
The response also includes any related starships for that person as well.
![Profile](./public/assets/media/docs/profile.gif)

####

## Test Cases

Links to the test cases are included within the app itself. These links will return the responses to the requirements
for this challenge.
Please view the index page of this application for test case links.

#### Although the test cases show responses related to each challenge requirement, we can get the details for any person (english or wookiee format), or the species details for any film. This is because the endpoints for person & film has been fully developed.

> Each test case link will return a raw json response like the one below that has met the requirements

### All Spaceships related to Luke Skywalker

> This response returns the person details for Luke Skywalker as well as the spaceships related to this person.

```json
{
    "code": 200,
    "status": "OK",
    "message": "OK",
    "data": {
        "format": null,
        "url": "https://swapi.dev/api/people/1/",
        "image": "http://test-code10:8888/assets/media/avatars/300-13.jpg",
        "homeWorldImage": "http://test-code10:8888/assets/media/stock/600x400/img-50.jpg",
        "name": "Luke Skywalker",
        "height": 172,
        "mass": 77,
        "hairColor": "blond",
        "skinColor": "fair",
        "eyeColor": "blue",
        "birthYear": "19BBY",
        "gender": "male",
        "homeWorld": "https://swapi.dev/api/planets/1/",
        "createdOn": "2014-12-09T13:50:51.644000Z",
        "editedOn": "2014-12-20T21:17:56.891000Z",
        "noOfFilms": 4,
        "noOfStarShips": 2,
        "noOfVehicles": 2,
        "starships": [
            {
                "image": "http://test-code10:8888/assets/media/stock/900x600/82.jpg",
                "name": "X-wing",
                "model": "T-65 X-wing",
                "manufacturer": "Incom Corporation",
                "cost_in_credits": 149999,
                "length": 12,
                "max_atmosphering_speed": 1050,
                "crew": 1,
                "passengers": 0,
                "cargo_capacity": 110,
                "consumables": "1 week",
                "hyperdrive_rating": 1,
                "starship_class": "Starfighter",
                "created": "2014-12-12T11:19:05.340000Z",
                "edited": "2014-12-20T21:23:49.886000Z",
                "url": "https://swapi.dev/api/starships/12/"
            },
            {
                "image": "http://test-code10:8888/assets/media/stock/900x600/21.jpg",
                "name": "Imperial shuttle",
                "model": "Lambda-class T-4a shuttle",
                "manufacturer": "Sienar Fleet Systems",
                "cost_in_credits": 240000,
                "length": 20,
                "max_atmosphering_speed": 850,
                "crew": 6,
                "passengers": 20,
                "cargo_capacity": 80000,
                "consumables": "2 months",
                "hyperdrive_rating": 1,
                "starship_class": "Armed government transport",
                "created": "2014-12-15T13:04:47.235000Z",
                "edited": "2014-12-20T21:23:49.900000Z",
                "url": "https://swapi.dev/api/starships/22/"
            }
        ]
    }
}
```

### All Species for Episode 1

> This response returns the details of episode 1 as well as a collection of all species related to that episode

```json
{
  "code": 200,
  "status": "OK",
  "message": "OK",
  "data": {
    "format": null,
    "image": "https://cdn2.iconfinder.com/data/icons/space-filled-outline-6/128/Space_-_Filled_Outline_-_38-1-512.png",
    "title": "A New Hope",
    "episodeId": 4,
    "opening_crawl": "It is a period of civil war.\r\nRebel spaceships, striking\r\nfrom a hidden base, have won\r\ntheir first victory against\r\nthe evil Galactic Empire.\r\n\r\nDuring the battle, Rebel\r\nspies managed to steal secret\r\nplans to the Empire's\r\nultimate weapon, the DEATH\r\nSTAR, an armored space\r\nstation with enough power\r\nto destroy an entire planet.\r\n\r\nPursued by the Empire's\r\nsinister agents, Princess\r\nLeia races home aboard her\r\nstarship, custodian of the\r\nstolen plans that can save her\r\npeople and restore\r\nfreedom to the galaxy....",
    "director": "George Lucas",
    "producer": "Gary Kurtz, Rick McCallum",
    "release_date": "1977-05-25",
    "created": "2014-12-10T14:23:31.880000Z",
    "edited": "2014-12-20T19:49:45.256000Z",
    "url": "https://swapi.dev/api/films/1/",
    "totalSpeciesCount": 5,
    "species": [
      {
        "classification": "mammal",
        "created": "2014-12-10T13:52:11.567000Z",
        "edited": "2014-12-20T21:36:42.136000Z",
        "url": "https://swapi.dev/api/species/1/"
      },
      {
        "classification": "artificial",
        "created": "2014-12-10T15:16:16.259000Z",
        "edited": "2014-12-20T21:36:42.139000Z",
        "url": "https://swapi.dev/api/species/2/"
      },
      {
        "classification": "mammal",
        "created": "2014-12-10T16:44:31.486000Z",
        "edited": "2014-12-20T21:36:42.142000Z",
        "url": "https://swapi.dev/api/species/3/"
      },
      {
        "classification": "sentient",
        "created": "2014-12-10T17:05:26.471000Z",
        "edited": "2014-12-20T21:36:42.144000Z",
        "url": "https://swapi.dev/api/species/4/"
      },
      {
        "classification": "gastropod",
        "created": "2014-12-10T17:12:50.410000Z",
        "edited": "2014-12-20T21:36:42.146000Z",
        "url": "https://swapi.dev/api/species/5/"
      }
    ]
  }
}
```

### Total population for all planets in the Star Wars Galaxy

> This response returns the total sum of all planets that have a population in the Galaxy

```json
{
  "code": 200,
  "status": "OK",
  "message": "OK",
  "data": {
    "totalGalacticPopulation": 1711401432500,
    "noOfPlanetsWithWithPopulation": 43
  }
}
```

### All spaceships related to Luke Skywalker - Wookiee Format

> This response returns the person details & related spaceship for a person in Wookiee language format

```json
{
  "code": 200,
  "status": "OK",
  "message": "OK",
  "data": {
    "format": null,
    "name": "Lhuorwo Sorroohraanorworc",
    "height": 172,
    "mass": 77,
    "hairColor": "rhanoowhwa",
    "skinColor": "wwraahrc",
    "eyeColor": "rhanhuwo",
    "birthYear": "19BBY",
    "gender": "scraanwo",
    "homeWorld": "acaoaoakc://cohraakah.wawoho/raakah/akanrawhwoaoc/1/",
    "url": "acaoaoakc://cohraakah.wawoho/raakah/akwoooakanwo/1/",
    "starships": [
      {
        "requestedFormat": null,
        "name": "X-ohahwhrr",
        "model": "T-65 X-ohahwhrr",
        "manufacturer": "Iwhoaoosc Coorcakoorcraaoahoowh",
        "cost_in_credits": 149999,
        "length": 12,
        "max_atmosphering_speed": 1050,
        "crew": 1,
        "passengers": 0,
        "cargo_capacity": 110,
        "consumables": "1 ohwowoor",
        "hyperdrive_rating": 1,
        "starship_class": "Saorarcwwahrracaoworc",
        "created": "2014-12-12T11:19:05.340000Z",
        "edited": "2014-12-20T21:23:49.886000Z",
        "url": "acaoaoakc://cohraakah.wawoho/raakah/caorarccacahakc/12/"
      },
      {
        "requestedFormat": null,
        "name": "Iscakworcahraan cachuaoaoanwo",
        "model": "Lrascrhwara-oaanracc T-4ra cachuaoaoanwo",
        "manufacturer": "Sahwowhrarc Fanwowoao Srocaowoscc",
        "cost_in_credits": 240000,
        "length": 20,
        "max_atmosphering_speed": 850,
        "crew": 6,
        "passengers": 20,
        "cargo_capacity": 80000,
        "consumables": "2 scoowhaoacc",
        "hyperdrive_rating": 1,
        "starship_class": "Arcscwowa rroohoworcwhscwowhao aorcrawhcakoorcao",
        "created": "2014-12-15T13:04:47.235000Z",
        "edited": "2014-12-20T21:23:49.900000Z",
        "url": "acaoaoakc://cohraakah.wawoho/raakah/caorarccacahakc/22/"
      }
    ]
  }
}
```

#### Thats it!

Thanks for allowing me the opportunity to build a full-stack web app for the Star Wars Galaxy!!!
