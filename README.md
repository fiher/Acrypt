# Acrypt
Why Acrypt?Cause it's Awesome crypt = Acrypt

# What is the main idea behind Acrypt?

<h5>The idea is to create more than 50 small cyphers for encrypting data and 50 more for decrypting the encrypted data and also 50 small cyphers to hash data. Now after all of this is set and done I plan on creating a way to create a custom algorithm based on those 50 small ciphers. First I will create 16 big cyphers each consisting of unique combination of 6 small cyphers. <h5>
</br>
<h5> These big cyphers will have their own execution order meaning that they will have 6 cyphers called in unique order for example if they are named from 0 to 5 the execution order would look like "320203405021030405" where each number represends a cypher. Every big cypher will have its own secret keys and privatee dictionaries to change values. After all of the 16th big cyphers are ready there will be another set of generated order representing the order in which each big cypher should be invoked which will be a number in hexadecimal. There will be also a custom ASCII code table. The main idea being that if you download the algorithm you will have unique version and nobody will know about it. No hacker can crack an algorithm if he doesn't have the source code. This means that even if they have access to the databse as long as they don't have access to the server they can't do anything.In case you think it is not safe enough, meaning if somebody has access to your server that my algorithm won't protect the data then you could use it before using your actual hashing or encrypting algorithm. Using this algorithm before using another proven to be safe algorithm  means that if they don't have access to the server they can't use bruteforce attacks or dictionary attacks or any sort of attacks really, but if they do then the proven to be safe algorithm will save you.<h5>

<h5>This is a good option in case history repeats itself and the currently good hash algorithms such as bcrypt get broken. In this case if you use my algorithm before using bcrypt then they can't do nothing even if bcrypt gets broken. As far as my algorithm goes...it can't get broken since it will act differently for each downloaded version and the person downloading it is the only one knowing about it.</h5>
