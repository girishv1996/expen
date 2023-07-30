def greet_time(response):
    if response == '1':
        print("Good Morning")
    elif response == '2':
        print("Good Afternoon")
    else:
        print("Invalid response. Please enter 1 or 2.")

if __name__ == "__main__":
    user_response = input("Enter 1 for 'Good Morning' or 2 for 'Good Afternoon': ")
    greet_time(user_response)
