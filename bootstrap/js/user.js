var personManager = function(){
    var fullNameSeparator = " ";
    return{
         setFullNameSeparator : function(separator){
             return fullNameSeparator = separator;
         } ,
    $get:function(person){
      return{
          getFirstName: function(){
              return person.firstname;
          },
          getLastName:function(){
              return person.lastname;
          },
          getFullName:function(fullNameSeparator){
              return person.firstname+fullNameSeparator+person.lastname;
          }
      }
        }
    }
    };

angular.module("myApp",[])
.value("person",{
        firstname:"",
        lastname:""
    })
.provider("personManager", personManager)
.config(function(personManagerProvider){
        personManagerProvider.setFullNameSeparator("*");
    })
.run(function(person){
        person.firstname="Almaz";
        person.lastname="Dzhumabaev";
    })
.controller("myController", function($scope,person,personManager){
        $scope.personInstance=person;
        $scope.personManagerInstance = personManager;
    });
