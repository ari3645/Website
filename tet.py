word = "samourai"
rep=""
liste=["a","e","i","u","o"]
for i in range(len(word)):
    print(word[i] in liste)
    if word[i] in liste == True:
        rep=rep+word[i]+"-"
    else:
        rep=rep+word[i]
print(rep)
