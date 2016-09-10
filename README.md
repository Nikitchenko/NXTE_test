# NXTE_test
The correct conclusion to a table of a random two-dimensional associative array with key-value observing compliance.
+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Once I got the test task:

The goal of this test is to get a good indication of your level as a PHP programmer.
 Do as much of the test as possible. That means that if you are unable to finish the complete project
 that you must focus on doing as much as possible but that the code will be up to your programming standard.
 Create the application in such a way that it runs without the need for modification 
(like configuration). This is a very important aspect. So test your application on the 
CLI before sending it!

Consider the following 
array:

array(
    
array(
        'House' => 'Baratheon',
        'Sigil' => 'A crowned stag',
   'Motto' => 'Ours is the Fury',
        ),

array(
        'Leader' => 'Eddard Stark',
   'House' => 'Stark',
        'Motto' => 'Winter is Coming',
        'Sigil' => 'A grey direwolf'
        ),
 
array(
        'House' => 'Lannister',
        'Leader' => 'Tywin Lannister',
       'Sigil' => 'A golden lion'
        ),

array(
	      'Q' => 'Z'
    )

);


Write an application that uses the MVC pattern that will take this array and prints the following 
ASCII table:


=========================================================================

|     House |           Leader |            Motto | Q |           Sigil |

-------------------------------------------------------------------------

| Baratheon |                  | Ours is the Fury |   |  A crowned stag |

|     Stark |     Eddard Stark | Winter is Coming |   | A grey direwolf |

| Lannister |  Tywin Lannister |                  |   |   A golden lion |

|           |                  |                  | Z |                 |

=========================================================================



Take into account the following:

o The keys of the supplied array are in random order.

o The keys in the table are sorted in alphabetical order.

o The array keys and values are examples. The application mustbe able to take every kind and number of keys.

o The length of the array is an example. The application must be able to take everynumber of rows.

o The number of keys can vary for every row of data.
 If some keys are missing this may not break the program. 
 And the data must still be shown correctly in the table with the missing cell kept blank.

o The text in every cell is right alligned.

o The keys and values can be of any length.

o The array provided is not the array that we will use to test the application. 
That will be a completely different array with different keys and values.
 It will have 1.000.000 rows and dozens of different keys.

++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
I was racked my head on it 5 days.
As a result, I got this.
Yes. I did not create the IEC template. But still, there are a lot of interesting code here.
