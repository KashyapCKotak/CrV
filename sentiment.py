import json
import datetime
from textblob import TextBlob
from textblob.sentiments import NaiveBayesAnalyzer
with open('currentNews.json', 'r', encoding="utf8") as newsFile:
    newsContent = json.load(newsFile)
    for news in newsContent['Data']:
        if int(news['id']) > 137674:
            if 'sentiment' not in news:
                print(news['id'])
                print(news['title'])
                print(news['body'])
                titleBlob=TextBlob(news['title'], analyzer=NaiveBayesAnalyzer())
                bodyBlob=TextBlob(news['body'], analyzer=NaiveBayesAnalyzer())
                print(datetime.datetime.now())
                titleSent=titleBlob.sentiment
                print(titleSent)
                print(datetime.datetime.now())
                bodySent=bodyBlob.sentiment
                print(bodySent)
                print(datetime.datetime.now())
                totalSentPos=round((titleSent.p_pos+bodySent.p_pos)/2,4)*100
                totalSentNeg=round((titleSent.p_neg+bodySent.p_neg)/2,4)*100
                print(totalSentPos)
                print(totalSentNeg)
                news['sentiment']=str(totalSentPos)+"&"+str(totalSentNeg)
                print(news['sentiment'])
                print("#############")