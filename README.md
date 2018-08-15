#GAME MANAGER

###THE GAME 

There are three types of buildings in this game:

- Castle
    - The Castle has a lifespan of 100 Hit Points.
    - When the Castle is hit, 10 Hit Points are deducted from it's lifespan.
    - If/When the Castle has run out of Hit Points, the city is taken regardless 
    of the state of the other buildings
    - There is only 1 Castle.
- House
    - Houses have a lifespan of 75 Hit Points.
    - When a House is hit, 20 Hit Points are deducted from it's lifespan.
    - There are 4 Houses.
- Farm
    - Farms have a lifespan of 50 Hit Points.
    - When a Farm is hit, 25 Hit Points are deducted from it's lifespan.
    - There are 4 Farms.

- Gameplay:

    - To play, a user is able to attack a random building.
    - The selection of a building is random.
    - Trebuchets are old and not too accurate tools therefore leave 10% chance for 
    missing the target in any given attack.
    - The result of each attack need to be displayed. (which building it hit/ missed)
    - When all the buildings destroyed, a success message is shown.

###INSTRUCTIONS 

The foundations of the game have been done for you, albeit with one or two errors for 
you to find ;) Using session management to store the state, and routing to manage the game, 
the objective is to create a game manager that lets you start new games, view the status 
of your games, and launch an attack on an existing game that has not finished.

###USEFUL RESOURCES

http://symfony.com/doc/current/components/http_foundation/sessions.html
https://silex.symfony.com/doc/2.0/usage.html

###QUESTIONS

- Pretend that the content of the libraries folder is libraries that you created and 
would pull in as vendors. think about what the potential problems you should expect 
when using "LIB\BuildingAction\BuildingActions" briefly explain the issue and provide 
1-2 ways to fix it (also implement 1 if you can)

- If you wanted to host this online how would you make the application more secure just 
by changing one thing in the file structure

###ANSWERS

Please submit any answers to questions here 

- Problems when using "LIB\BuildingAction\BuildingActions":
+ Requires classes implementing the BuildingActions trait to have the attributes health and damage in order for the trait to be used.
- how would you make the application more secure just by changing one thing in the file structure
+ place the files that need to be accessed by the world in a different directory, separate from the rest of the code e.g. in this application this would be the web directory

###BONUS POINTS

- Add a Dockerfile that allows us to run the application with just one docker command

###SUBMITTING RESULTS 

Create a git archive of the project and send that to us as your solution with only the 
necessary files in it.
 




